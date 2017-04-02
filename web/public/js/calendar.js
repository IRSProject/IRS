        var saved = function (data, status) {
            if(status == 200) {
                var eventData = {
                    title: $('#title').val(),
                    start: $('#start').val(),
                    description: $('#description').val(),
                    end: $('#end').val(),
                    id: data
                };

                $('#calendar').fullCalendar('renderEvent', eventData, true);

                $('#create-event').modal('hide');
                $('#create-event').find('input[type=text], textarea').val('');
            } else {
                data = JSON.parse(data);
                for(var err in data) {
                    $('#' + err).attr('style', 'border: 1px solid red')
                            .next().html('<strong style="color: red">' + data[err] + '</strong>');

                }
            }

        };

        var deleted = function (data, status) {
            if (status == 200) {
                $('#view-event').modal('hide');
                $('#calendar').fullCalendar('removeEvents', data);
            } else {
                alert (data);
            }
        };

        var confirmation = function () {
            var c = confirm('are you sure ?' );
            if(!c) {
                return false;
            }
            return true;
        };


$(document).ready(function () {
    $('#calendar').fullCalendar({
			    minTime: '07:30',
			    slotDuration: '00:02:30',
			    maxTime: '16:15',
			    schedulerLicenseKey: 'GPL-My-Project-Is-Open-Source',
			    editable: true,
			    aspectRatio: 1.8,
			    scrollTime: '00:00',
			    header: {
				    left: 'today prev,next',
				    center: 'title',
				    right: 'timelineDay, month'
			    },
			    defaultView: 'timelineDay',
			    views: {
				    timelineThreeDays: {
					    type: 'timeline',
					    duration: { days: 3 }
				    }
			    },
			    eventOverlap: false, // will cause the event to take up entire resource height
			    resourceAreaWidth: '25%',
			    resourceLabelText: 'Lines',
			    resources: $('#resources_url').val(),
			    events: $('#events_url').val()
		    });
});
