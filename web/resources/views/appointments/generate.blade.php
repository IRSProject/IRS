@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
        		    <form action="{{ route('appointment.generate') }}" method="post">
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

			                     <div class="form-group{{ $errors->has('month') ? ' has-error' : '' }}">
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

 
                        <form action="{{route('appointment.accept')}}" method="POST">
                            {{csrf_field()}}
                            <input type="hidden" name="vehicle_id" value="{{$appointment['vehicle_id']}}" />
                            <input type="hidden" name="date" value="{{$appointment['date']}}" />
                            <input type="hidden" name="station_id" value="{{$appointment['station']}}" />
                            <input type="hidden" name="vehicle_id" value="{{$vehicle_id}}" />
                            <input type="submit" value="Generate" class="btn btn-success" />
                        </form>
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
