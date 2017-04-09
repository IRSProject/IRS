@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
        		    <form action="{{ route('appointment.store') }}" method="post">
        			        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus>

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('vehicle') ? ' has-error' : '' }}">
                            <label for="vehicle" class="col-md-4 control-label">Vehicles</label>

                            <div class="col-md-6">
                                <select id="vehicle_id" class="form-control" name="vehicle_id" required >
				    @foreach($vehicles as $vehicle)
				    <option value="{{$vehicle->id}}">{{ $vehicle->plate_number }}</option>
				    @endforeach
				</select>

                                @if ($errors->has('vehicle_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('vehicle_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('station_id') ? ' has-error' : '' }}">
                            <label for="station_id" class="col-md-4 control-label">Stations</label>

                            <div class="col-md-6">
                                <select id="station_id" class="form-control" name="station_id" required >
				    @foreach($stations as $station)
				    <option value="{{$station->id}}">{{ $station->name }}</option>
				    @endforeach
				</select>

                                @if ($errors->has('station_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('station_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

			<div class="form-group{{ $errors->has('resourceId') ? ' has-error' : '' }}">
			  <label for="resourceId" class="col-md-4 control-label">Line</label>

			      <div class="col-md-6">
				<select name="resourceId" id="resourceId" class="form-control">
				    @foreach(App\Line::all() as $line)
					<option value="{{$line->id}}">{{$line->number}}</option>
				    @endforeach
				</select>
                                @if ($errors->has('resourceId'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('resourceId') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

			                     <div class="form-group{{ $errors->has('start') ? ' has-error' : '' }}">
                            <label for="start" class="col-md-4 control-label">start Time</label>

                            <div class="col-md-6">
                                <input id="start" type="datetime-local" class="form-control" name="start" value="{{ old('start') }}" required autofocus>

                                @if ($errors->has('start'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('start') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('end') ? ' has-error' : '' }}">
                            <label for="end" class="col-md-4 control-label">End Time</label>

                            <div class="col-md-6">
                                <input id="end" type="datetime-local" class="form-control" name="end" value="{{ old('end') }}" required autofocus>

                                @if ($errors->has('end'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('end') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

        			<div class="col-xs-12 col-sm-12 col-md-12 text-center">
        			  <input type="submit" value="save" class="btn btn-success" />
        			</div>
        		    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function () {
    $('#station_id').change(function () {
	var id = $(this).val();
	$.get(window.location.origin + '/api/v1/station/' + id + '/lines', function (response) {
	    var data = response.data;
	    var options = $('#resourceId');
	    options.find('option').remove().end(); 
	    $.each(data, function () {
		options.append($('<option />').val(this.id).text(this.number));
	    });
	});
    });
});
</script>
@endsection
