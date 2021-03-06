(function() {

	// main attribute for Ajaxer.
	var axerAttrib = 'axer';

	/**
	 * axer attributes
	 * 
	 * @type {Object}
	 */
	var attribs = {
		// return the action attrib
		action: function (element) {
			return element.getAttribute(axerAttrib + '-action') || null;
		},

		// return the result attrib
		result: function (element) {
			return element.getAttribute(axerAttrib + '-action-result') || null;
		},

		// return the loading attrib
		loading: function (element) {
			return element.getAttribute(axerAttrib + '-loading') || null;
		},

		// return the redirect element
		redirect: function (element) {
			return element.getAttribute(axerAttrib + '-redirect') || null;
		},

		// return the before attrib
		before: function (element) {
			return element.getAttribute(axerAttrib + '-before') || null;
		},

		// return the after attrib
		after: function (element) {
			return element.getAttribute(axerAttrib + '-after') || null;
		},

		// return method
		method: function (element) {
			return element.getAttribute(axerAttrib + '-method') || null;
		},
	};

	/**
	 * ajax request.
	 * 
	 * @param  {[type]} url     [description]
	 * @param  {Object} options [description]
	 * @return {[type]}         [description]
	 */
	var ajax = function (url, options) {
		var urlData = '';
		var request = new XMLHttpRequest();

		// if type is given.
		if (options.type) {
			request.open(options.type, url, true);
		} else {
			request.open('GET', url, true);
		}
		// set default header.
		request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

		var proceed = true;
		// if before callback is given
		if (options.beforeCallback) {
			proceed = (options.beforeCallback(request));
		}

		// form data.
		if (options.data) {
			var keys = Object.keys(options.data);
			for (var i = 0; i < keys.length; i++) {
				urlData += keys[i] + '=' + options.data[keys[i]];
				if (i < keys.length - 1) {
					urlData += '&';
				}
			}
		}

		// when request is done.
		request.onreadystatechange = function () {
			if (this.readyState == 4) {
				if (options.afterCallback) {
					options.afterCallback(request.responseText, request.status);
				}

			}
		};

		// send the request.
		if(proceed !== false)
			if (urlData) {
				request.send(urlData);
			} else {
				request.send();
			}
	};

	

	/**
	 * call is the function that do the action 
	 * for the axer element.
	 * 
	 * @param  {object} form [description]
	 * @return {void}      [description]
	 */
	var call = function (el) {

		var action = attribs.action(el);
		var before = attribs.before(el);
		var after = attribs.after(el);
		var result = attribs.result(el);
		var loading = attribs.loading(el);
		var redirect = attribs.redirect(el);
		var method = attribs.method(el);

		var proceed = true;

		if (action) {
			var options = {};

			// send the method if exists.
			if (method) {
				method = method.toUpperCase();
				options.type = method;
			}

			/**
			 * set function to call before request is done.
			 * 
			 * @return {[type]} [description]
			 */
			options.beforeCallback = function() {

				// if loading provided, display it.
				if (loading) {
					document.getElementById(loading).style.display = 'block';
				}

				// if before provided call it.
				if (before) {
					proceed = window[before]();
					return proceed;
				}
			};

			/**
			 * set functions to call after request is done.
			 * 
			 * @param  {[type]} data [description]
			 * @return {[type]}      [description]
			 */
			options.afterCallback = function (data, response) {
				// if axer-after is given.
				if (after) {
					window[after](data, response);
				}

				// if loading is given.
				if (loading) {
					document.getElementById(loading).style.display = 'none';
				}

				// if result is given.
				if (result) {
					var res = document.getElementById(result);
					res.innerHTML = data;
				}

				// if redirect is given.
				if (redirect) {
					document.location = redirect;
				}
			};

			var formElements = el.elements;
			if (formElements) {
				var data = {};
				data['_method'] = method;

				for (var i = 0; i < formElements.length; i++) {
					if (formElements[i].name.length) {
						data[formElements[i].name] = formElements[i].value;
					}
				}

				options.data = data;
			}

			ajax(action,options);
		}
	}

	/**
	 * Prevent default submit of a form.
	 * 
	 * @param  {[type]} form [description]
	 * @return {[type]}      [description]
	 */
	var preventDef = function (el) {

		if (el.nodeName == 'FORM') {
			el.onsubmit = function (event) {
				event.preventDefault();
				call(el);
			};
		} else {
			el.addEventListener('click', function (event) {
				event.preventDefault();
				call(el);
			});
		}
	};

	/**
	 * ajaxer main function.
	 *
	 * @return {void} [description]
	 */
	var axer = function () {

		// get all elements.
		var elements = document.getElementsByTagName('*');
		for(var i = 0 ; i < elements.length ; i++) {
			if (elements[i].hasAttribute(axerAttrib)) {
				preventDef(elements[i]);
			}
		}
	}();
}());