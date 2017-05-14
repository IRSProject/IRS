@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Book Appointment</div>

                <div class="panel-body">
        		    <form action="{{ route('appointment.store') }}" method="post">
        			        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('vehicle') ? ' has-error' : '' }} col-xs-12 col-sm-12 col-md-12">
                            <label for="vehicle" class="col-md-4 control-label">Vehicles</label>

                            <div class="col-md-6">
                                <select id="vehicle_id" class="form-control" name="vehicle_id" required >
                        				    @foreach($vehicles as $vehicle)
                        				    <option value="{{$vehicle->id}}">{{$vehicle->plate_code . ' ' . $vehicle->plate_number}}</option>
                        				    @endforeach
                        				</select>

                                @if ($errors->has('vehicle_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('vehicle_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('station_id') ? ' has-error' : '' }} col-xs-12 col-sm-12 col-md-12">
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

                  			<div class="form-group{{ $errors->has('resourceId') ? ' has-error' : '' }} col-xs-12 col-sm-12 col-md-12">
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

			                     <div class="form-group{{ $errors->has('month') ? ' has-error' : '' }} col-xs-12 col-sm-12 col-md-12">
                            <label for="month" class="col-md-4 control-label">Month</label>

                            <div class="col-md-6">
                                <input id="month" type="date" class="form-control" name="month" value="{{ old('month') }}" required autofocus>

                                @if ($errors->has('month'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('month') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                  			 <div class="form-group{{ $errors->has('time') ? ' has-error' : '' }} col-xs-12 col-sm-12 col-md-12">
                      <label for="time" class="col-md-4 control-label">Time</label>

                      <div class="col-md-6">
                          <select id="time" class="form-control" name="time" value="{{ old('time') }}" required >
                  				    @foreach($times as $time)
                  				    <option value="$time">{{$time}}</option>
                  				    @endforeach
                  				</select>
                                @if ($errors->has('time'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('time') }}</strong>
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

    $('#resourceId').change(function () {
	$('#month').trigger('change');
    });

    $('#month').change(function () {
	$.get(window.location.origin + '/api/v1/times/' + $('#month').val() + '/' + $('#resourceId').val() + '/?vehicle_id=' + $('#vehicle_id').val(), function (response) {
	    $('#time').find('option').remove().end();
	    $.each(response, function () {
		$('#time').append($('<option />').val(this).text(this));
	    });
	});
    });

    $('#station_id').trigger('change');

});
</script>
@endsection
