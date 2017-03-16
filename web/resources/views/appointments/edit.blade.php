@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
		    <form action="{{ route('appointment.update', ['id' => $appointment->id]) }}" method="post">
			{{ csrf_field() }}
			<input type="hidden" value="patch" name="_method" />
                        <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                            <label for="date" class="col-md-4 control-label">Date</label>

                            <div class="col-md-6">
				<input id="date" type="date" class="form-control" name="date" value="{{ old('date', $appointment->date) }}" required autofocus>

                                @if ($errors->has('date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

			<div class="form-group{{ $errors->has('time') ? ' has-error' : '' }}">
                            <label for="time" class="col-md-4 control-label">Time</label>

                            <div class="col-md-6">
				<input id="time" type="time" class="form-control" name="time" value="{{ old('time', $appointment->time) }}" required autofocus>

                                @if ($errors->has('time'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('time') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
			<div class="form-group{{ $errors->has('station_id') ? ' has-error' : '' }}">
                            <label for="station_id" class="col-md-4 control-label">Station</label>

                            <div class="col-md-6">
				<select name="station_id" id="station_id" class="form-control">
				    @foreach(App\Station::all() as $station)
				    <option {{ $station->id == $appointment->station_id? 'selected': '' }} value="{{$station->id}}">{{$station->name}}</option>
				    @endforeach
				</select>
                                @if ($errors->has('station_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('station_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
			<div class="form-group{{ $errors->has('line_id') ? ' has-error' : '' }}">
                            <label for="line_id" class="col-md-4 control-label">Line</label>

                            <div class="col-md-6">
				<select name="line_id" id="line_id" class="form-control">
				    @foreach(App\Line::all() as $line)
				    <option {{ $appointment->line_id == $line->id? 'selected': '' }} value="{{$line->id}}">{{$line->number}}</option>
				    @endforeach
				</select>
                                @if ($errors->has('line_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('line_id') }}</strong>
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
@endsection
