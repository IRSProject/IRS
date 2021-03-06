@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add user</div>

                <div class="panel-body">
          		    <form action="{{ route('user.store') }}" method="post">
          			       {{ csrf_field() }}
                       <div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }} col-xs-12 col-sm-12 col-md-12">
                           <label for="fname" class="col-md-4 control-label">First Name</label>

                           <div class="col-md-6">
                               <input id="fname" type="text" class="form-control" name="fname" value="{{ old('fname') }}" required autofocus>

                           </div>
                       </div>
<br/>
                   <div class="form-group{{ $errors->has('lname') ? ' has-error' : '' }} col-xs-12 col-sm-12 col-md-12">
                           <label for="lname" class="col-md-4 control-label">Last Name</label>

                           <div class="col-md-6">
                               <input id="lname" type="text" class="form-control" name="lname" value="{{ old('lname') }}" required autofocus>

                               @if ($errors->has('lname'))
                                   <span class="help-block">
                                       <strong>{{ $errors->first('lname') }}</strong>
                                   </span>
                               @endif
                           </div>
                       </div>
<br/>
                   <div class="form-group{{ $errors->has('mother_name') ? ' has-error' : '' }} col-xs-12 col-sm-12 col-md-12">
                           <label for="mother_name" class="col-md-4 control-label">Mother Name</label>

                           <div class="col-md-6">
                               <input id="mother_name" type="text" class="form-control" name="mother_name" value="{{ old('mother_name') }}" 					required autofocus>

                               @if ($errors->has('mother_name'))
                                   <span class="help-block">
                                       <strong>{{ $errors->first('mother_name') }}</strong>
                                   </span>
                               @endif
                           </div>
                       </div>
<br/>
                   <div class="form-group{{ $errors->has('date_of_birth') ? ' has-error' : '' }} col-xs-12 col-sm-12 col-md-12">
                           <label for="date_of_birth" class="col-md-4 control-label">Date Of Birth</label>

                           <div class="col-md-6">
                               <input id="date_of_birth" type="date" class="form-control" name="date_of_birth" value="{{ old	('date_of_birth') }}" required autofocus>

                               @if ($errors->has('date_of_birth'))
                                   <span class="help-block">
                                       <strong>{{ $errors->first('date_of_birth') }}</strong>
                                   </span>
                               @endif
                           </div>
                       </div>
<br/>
                   <div class="form-group{{ $errors->has('place_of_birth') ? ' has-error' : '' }} col-xs-12 col-sm-12 col-md-12">
                           <label for="place_of_birth" class="col-md-4 control-label">Place Of Birth</label>

                           <div class="col-md-6">
                               <input id="place_of_birth" type="text" class="form-control" name="place_of_birth" value="{{ old('place_of_birth') }}" required>

                               @if ($errors->has('place_of_birth'))
                                   <span class="help-block">
                                       <strong>{{ $errors->first('place_of_birth') }}</strong>
                                   </span>
                               @endif
                           </div>
                       </div>
<br/>
                   <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }} col-xs-12 col-sm-12 col-md-12">
                           <label for="phone" class="col-md-4 control-label">Phone</label>

                           <div class="col-md-6">
                               <input id="phone" type="integer" class="form-control" name="phone" value="{{ old('phone') }}" required placeholder="00961xxxxxxxx">

                               @if ($errors->has('phone'))
                                   <span class="help-block">
                                       <strong>{{ $errors->first('phone') }}</strong>
                                   </span>
                               @endif
                           </div>
                       </div>
<br/>
                   <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }} col-xs-12 col-sm-12 col-md-12">
                           <label for="address" class="col-md-4 control-label">Address</label>

                           <div class="col-md-6">
                               <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required 						autofocus>

                               @if ($errors->has('address'))
                                   <span class="help-block">
                                       <strong>{{ $errors->first('address') }}</strong>
                                   </span>
                               @endif
                           </div>
                       </div>
<br/>
                   <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-xs-12 col-sm-12 col-md-12">
                           <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                           <div class="col-md-6">
                               <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required 						placeholder="someone@someone.com">

                               @if ($errors->has('email'))
                                   <span class="help-block">
                                       <strong>{{ $errors->first('email') }}</strong>
                                   </span>
                               @endif
                           </div>
                       </div>
<br/>
                       <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} col-xs-12 col-sm-12 col-md-12">
                           <label for="password" class="col-md-4 control-label">Password</label>

                           <div class="col-md-6">
                               <input id="password" type="password" class="form-control" name="password" required>

                               @if ($errors->has('password'))
                                   <span class="help-block">
                                       <strong>{{ $errors->first('password') }}</strong>
                                   </span>
                               @endif
                           </div>
                       </div>
                       <br/>
            			<div class="col-xs-12 col-sm-12 col-md-12 text-center">
            			  <input type="submit" value="save" class="btn btn-success" />
            			</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
