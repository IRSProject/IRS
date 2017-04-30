@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Generate Appointment</div>

                <div class="panel-body">
        		    <form action="{{ route('appointment.store') }}" method="post">
        			        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('vehicle') ? ' has-error' : '' }}">
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

			                  <div class="form-group{{ $errors->has('month') ? ' has-error' : '' }}">
                            <label for="month" class="col-md-4 control-label">From Date</label>

                            <div class="col-md-6">
                                <input id="month" type="date" class="form-control" name="frommonth" value="{{ old('frommonth') }}" required autofocus>

                                @if ($errors->has('frommonth'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('frommonth') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('month') ? ' has-error' : '' }}">
                            <label for="month" class="col-md-4 control-label">To Date</label>

                            <div class="col-md-6">
                                <input id="month" type="date" class="form-control" name="tomonth" value="{{ old('tomonth') }}" required autofocus>

                                @if ($errors->has('tomonth'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tomonth') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                			 <div class="form-group{{ $errors->has('time') ? ' has-error' : '' }}">
                                            <label for="time" class="col-md-4 control-label">time </label>

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
        			  <input type="submit" value="generate" class="btn btn-success" />
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
	$.get(window.location.origin + '/api/v1/times/' + $('#month').val() + '/' + $('#resourceId').val(), function (response) {
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
