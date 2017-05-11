@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Generate Appointment</div>
                <div class="panel-body">
          		    <form action="{{ route('appointment.generates') }}" method="get">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('vehicle') ? ' has-error' : '' }}">
                        <label for="vehicle" class="col-md-4 control-label">Vehicle</label>

                        <div class="col-md-6">
                            <select id="vehicle_id" class="form-control" name="vehicle_id" required >
                                @foreach(App\Vehicle::all() as $vehicle)
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
                      <label for="station_id" class="col-md-4 control-label">Station</label>

                      <div class="col-md-6">
                      <select name="station_id" id="station_id" class="form-control">
                          @foreach(App\Station::all() as $station)
                          <option value="{{$station->id}}">{{$station->name}}</option>
                          @endforeach
                      </select>
                              @if ($errors->has('station_id'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('station_id') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>
                      <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                       <label for="date" class="col-md-4 control-label">Date</label>

                       <div class="col-md-6">
                           <input id="date" type="date" class="form-control" name="date" value="{{ old('date') }}" required autofocus>

                           @if ($errors->has('date'))
                               <span class="help-block">
                                   <strong>{{ $errors->first('date') }}</strong>
                               </span>
                           @endif
                       </div>
                   </div>

              			<div class="col-xs-12 col-sm-12 col-md-12 text-center">
                      <br />
              			  <input type="submit" value="Generate" class="btn btn-outline btn-warning" />
              			</div>
          		    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
