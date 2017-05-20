@extends('layouts.app')

@section('content')
<input type="hidden" id="resources_url" value="{{ route('appointment.resources') }}" />
<input type="hidden" id="events_url" value="{{ route('api.v1.appointments.all') }}" />
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <div class="panel-heading">
                Book Appointment <a href="{{route('appointment.create')}}" class="btn btn-link"><i class="glyphicon glyphicon-plus"></i></a>
                Generate Appointment <a href="{{route('appointment.generates')}}" class="btn btn-link"><i class="glyphicon glyphicon-refresh"></i></a>
                My Appointments <a href="{{route('appointment.myapp')}}" class="btn btn-link"><i class="glyphicon glyphicon-list"></i></a>
                @if ( Auth::user() && Auth::user()->role == 'admin' )
                All Appointments <a href="{{route('appointment.allapp')}}" class="btn btn-link"><i class="glyphicon glyphicon-menu-hamburger"></i></a>
                @endif
                <br>
                @if ( Auth::user() && Auth::user()->role == 'operator' || Auth::user()->role == 'admin' )
                Today Appointments <a href="{{route('appointment.todayapp')}}" class="btn btn-link"><i class="glyphicon glyphicon-flash"></i></a>
                @endif
              </div>

		<div id="calendar"></div>
            </div>
        </div>
    </div>
</div>
<div id="create-event" class="modal fade" role="dialog">
    <div class="modal-dialog">

	<!-- Modal content-->
	<div class="modal-content">
	    <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="modal-title">Modal Header</h4>
	    </div>
	    <div class="modal-body">
		<form axer-method="POST" id="create-event"
		    axer='axer' axer-action = "{{ route('appointment.create') }}"
		    axer-after = "saved">
		    {{ csrf_field() }}

		    <div class="form-group ">
			<label for="description">Description</label>
			<textarea name="description" class='form-control' placeholder='Description'></textarea>
			<span class="bar-warning">
			    <strong style="color: red"></strong>
			</span>
		    </div>

		    <div class="form-group required">
			<label for="start">Start Date Time</label>
			<input type="datetime" name="start" id="start" class='form-control' placeholder='Start Date' />
			<span class="bar-warning">
			    <strong style="color: red"></strong>
			</span>
		    </div>

		    <div class="form-group required">
			<label for="end">End Date Time</label>
			<input type="datetime" name="end" id="end" class='form-control' placeholder='End Date' />
			<span class="bar-warning">
			    <strong style="color: red"></strong>
			</span>
		    </div>

		    <div class="form-group pull-right">
			<input type="submit" value="Save" class='form-control' />
		    </div>

		</form>
	    </div>
	    <div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	    </div>
	</div>

    </div>
</div>


<div id="view-event" class="modal fade" role="dialog">
    <div class="modal-dialog">

	<!-- Modal content-->
	<div class="modal-content">
	    <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="modal-title">Event</h4>
	    </div>
	    <form method='POST' axer-method='POST' axer='axer'
	  axer-action='scheduler/event/delete' axer-after='deleted'
	  axer-before= 'confirmation'>
		<input type="hidden" value="DELETE" name="_method" />
		<input type="hidden" value="" id="event-id" name="id" />
		<div class="modal-body" style="font-size: large">
		    <div>Title: <span style="text-align: center;" id="event-title"></span></div>
		    <div>description: <span style="text-align: center;" id="event-description"></span></div>
		    <div>Start: <span style="text-align: center;" id="event-start"></span></div>
		    <div>End: <span style="text-align: center;" id="event-end"></span></div>

		</div>
		<div class="modal-footer">
		    <button type="submit" class="btn btn-default">Delete</button>
		</div>
	    </form>
	</div>

    </div>
</div>

<link href='{{ url("css/fullcalendar.min.css") }}' rel='stylesheet' />
<link href='{{ url("css/fullcalendar.print.min.css") }}' rel='stylesheet' media='print' />
<link href='{{ url("css/scheduler.css") }}' rel='stylesheet' />
<script src='{{ url("js/moment.min.js") }}'></script>
<script src='{{ url("js/jquery.min.js") }}'></script>
<script src='{{ url("js/fullcalendar.min.js") }}'></script>
<script src='{{ url("js/scheduler.js") }}'></script>
<script src="{{url('js/calendar.js') }}"></script>
@endsection
