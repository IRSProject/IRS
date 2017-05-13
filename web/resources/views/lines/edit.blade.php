@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Line</div>

                <div class="panel-body">
		    <form action="{{ route('line.update') }}" method="post">
			<input type="hidden" name="_method" value="patch" />
			<input type="hidden" name="id" value="{{$line->id}}" />
			{{ csrf_field() }}

			<div class="col-xs-12 col-sm-12 col-md-12">
		   	  <div class="form-group">
			   <strong>Line	Number</strong>
			   <input name="number" value="{{$line->number}}" type="integer" class="form-control" placeholder="number">
		  	  </div>
	       		</div>

			<div class="col-xs-12 col-sm-12 col-md-12">
		   	  <div class="form-group">
		           <strong>Station</strong>
		           <select name="address" value="{{$line->address}}" type="text" class="form-control" placeholder="address">
				    @foreach(App\Station::all() as $station)
				    <option value="{{$station->id}}">{{$station->address}}</option>
				    @endforeach
				</select>
                                @if ($errors->has('station_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('station_id') }}</strong>
                                    </span>
                                @endif
				</select>
		  	  </div>
	       		 </div>
			<div class="col-xs-12 col-sm-12 col-md-12 text-center">
			  <button type="submit" class="btn btn-primary">Submit</button>
			</ div>
		    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
