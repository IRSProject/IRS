@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Vehicles <a href="{{route('vehicle.create')}}" class="btn btn-link"><i class="fa fa-plus"></i></a></div>

                <div class="panel-body">
		    <table class="table table-striped">
			<thead>
			  <tr>
			    <th>vehicle Plate Number: </th>
			  </tr>
			  <tr>
			    <th>vehicle Plate Code: </th>
			  </tr>
			  <tr>
			    <th>vehicle Brand: </th>
			  </tr>
			  <tr>
			    <th>vehicle Model: </th>
			  </tr>
			  <tr>
			    <th>vehicle Production Year: </th>
			  </tr>
			  <tr>
			    <th>vehicle Color: </th>
			  </tr>
			  <tr>
			    <th>vehicle Chasis Number: </th>
			  </tr>
			  <tr>
			    <th>vehicle Engine Number: </th>
			  </tr>
			  <tr>
			    <th>vehicle Aquisition Date: </th>
			  </tr>
			  <tr>
			    <th>vehicle Type: </th>
			  </tr>
			  <tr>
			    <th>vehicle Aperation Year: </th>
			  </tr>
			    <th>Actions</th>
			</thead>
			<tbody>
			@foreach($vehicles as $vehicle)
			  <tr>
			      <td><a href="{{route('vehicle.auth', ['vehicle' => $vehicle->id])}}">{{$vehicle->name}}</a></td>
			      <td>{{$vehicle->address}}</td>
			      <td>
				<a href="{{route('vehicle.edit', ['id' => $vehicle->id])}}" class="btn btn-success"> Edit </a>
				<form action="{{route('vehicle.delete')}}" method="POST">
				    {{csrf_field()}}
				    <input type="hidden" name="_method" value="DELETE" />
				    <input type="hidden" name="id" value="{{$vehicle->id}}" />
				    <input type="submit" value="DELETE" class="btn btn-danger" />
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
