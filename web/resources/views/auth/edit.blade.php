@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
          		    <form action="{{ route('auth.update') }}" method="post">
          			<input type="hidden" name="_method" value="patch" />
          			<input type="hidden" name="id" value="{{auth->id}}" />
          			{{ csrf_field() }}

          			<div class="col-xs-12 col-sm-12 col-md-12">
          		   	  <div class="form-group">
          			   <strong>Email</strong>
          			   <input name="email" value="{{auth->email}}" type="email" class="form-control" placeholder="email">
          		  	  </div>
          	       		</div>

          			<div class="col-xs-12 col-sm-12 col-md-12">
          		   	  <div class="form-group">
          		           <strong>Password</strong>
          		           <input name="password" value="{{$auth->password}}" type="password" class="form-control" placeholder="password" >
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
