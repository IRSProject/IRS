@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Users <a href="{{route('user.create')}}" class="btn btn-link"><i class="glyphicon glyphicon-plus"></i></a></div>

                <div class="panel-body">
          		    <table class="table table-striped">
              			<thead>
              			  <tr>
              			    <th>First Name</th>
              			    <th>Last Name</th>
                        <th>Role</th>
                        <th>Mother Name</th>
                        <th>Date Of Birth</th>
                        <th>Place Of Birth</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Email</th>
              			    <th>Actions</th>
              			  </tr>
              			</thead>
              			<tbody>
              			@foreach($users as $user)
              			  <tr>
              			      <td>{{$user->fname}}</td>
              			      <td>{{$user->lname}}</td>
                          <td>{{$user->role}}</td>
                          <td>{{$user->mother_name}}</td>
                          <td>{{$user->date_of_birth}}</td>
                          <td>{{$user->place_of_birth}}</td>
                          <td>{{$user->phone}}</td>
                          <td>{{$user->address}}</td>
                          <td>{{$user->email}}</td>
              			      <td>

              				<form action="{{route('user.delete')}}" method="POST">
              					<a href="{{route('user.edit', ['id' => $user->id])}}" class="btn btn-primary btn-xs glyphicon glyphicon-pencil"></a>
              				    {{csrf_field()}}
              				    <input type="hidden" name="_method" value="DELETE" />
              				    <input type="hidden" name="id" value="{{$user->id}}" />
                          <button class="btn btn-danger btn-xs glyphicon glyphicon-trash" data-title="Delete" data-toggle="modal" data-target="#delete"></button>
              				</form>
              			      </td>
              			  </tr>
              			@endforeach
              			</tbody>
          		    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
