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
                          <form method="get" action="/appointment/generate">
                   +				    <input type="date" name="date" />
                   +				    <input type="hidden" name="vehicle_id" value="{{$vehicle->id}}" />
                   +				    <select name="station">
                   +					@foreach(App\Station::all() as $station)
                   +					<option value="{{ $station->id }}">{{ $station->name }}</option>
                   +					@endforeach
                   +				    </select>
                   +				    <input type="submit" value="Delete" class="btn btn-danger" />
                   +				</form>
              			<div class="col-xs-12 col-sm-12 col-md-12 text-center">
              			  <input type="submit" value="Generate" class="btn btn-outline btn-warning" />
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
