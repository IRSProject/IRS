@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
		    <form action="{{ route('line.store') }}" method="post">
			{{ csrf_field() }}
			<div class="form-group{{ $errors->has('number') ? ' has-error' : '' }}">
                            <label for="n" class="col-md-4 control-label">Line Number</label>

                            <div class="col-md-6">
				<input id="number" type="integer" 
				class="form-control" name="number"
				value="{{ old('number') }}" required autofocus>

                                @if ($errors->has('number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('number') }}</strong>
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
			<div style="clear:both"></div>
			<div class="col-xs-12 col-sm-12 col-md-12 text-center">
			  <input type="submit" value="save" class="btn btn-success pull-center" >
			</div>
		    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
