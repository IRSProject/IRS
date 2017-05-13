@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Station</div>

                <div class="panel-body">
          		    <form action="{{ route('station.update') }}" method="post">
              			<input type="hidden" name="_method" value="patch" />
              			<input type="hidden" name="id" value="{{$user->id}}" />
              			{{ csrf_field() }}

                      <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                          <strong>First Name</strong>
                          <input name="fname" value="{{$user->fname}}" type="text" class="form-control" placeholder="">
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                          <strong>Last Name</strong>
                          <input name="lname" value="{{$user->lname}}" type="text" class="form-control" placeholder="">
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                          <strong>Role</strong>
                          <input name="role" value="{{$user->role}}" type="text" class="form-control" placeholder="">
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                          <strong>Mother Name</strong>
                          <input name="mother_name" value="{{$user->mother_name}}" type="text" class="form-control" placeholder="">
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                          <strong>Date Of Birth</strong>
                          <input name="date_of_birth" value="{{$user->date_of_birth}}" type="date" class="form-control" placeholder="">
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                          <strong>Place Of Birth</strong>
                          <input name="place_of_birth" value="{{$user->place_of_birth}}" type="text" class="form-control" placeholder="">
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                          <strong>Phone</strong>
                          <input name="phone" value="{{$user->phone}}" type="number" class="form-control" placeholder="">
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                          <strong>Address</strong>
                          <input name="address" value="{{$user->address}}" type="text" class="form-control" placeholder="">
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                          <strong>Email</strong>
                          <input name="email" value="{{$user->email}}" type="email" class="form-control" placeholder="">
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                          <strong>Password</strong>
                          <input name="password" value="{{$user->password}}" type="password" class="form-control" placeholder="">
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
