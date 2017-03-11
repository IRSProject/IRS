@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
		    <form action="{{ route('station.update') }}" method="post">
			<input type="hidden" name="_method" value="patch" />
			<input type="hidden" name="id" value="{{$station->id}}" />
			{{ csrf_field() }}

			<div class="col-xs-12 col-sm-12 col-md-12">
		   	  <div class="form-group">
			   <strong>Name</strong>
			   <input name="name" value="{{$station->name}}" type="text" class="form-control" placeholder="name">
		  	  </div>
	       		</div>

			<div class="col-xs-12 col-sm-12 col-md-12">
		   	  <div class="form-group">
		           <strong>Address</strong>
		           <input name="address" value="{{$station->address}}" type="text" class="form-control" placeholder="address" >
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


