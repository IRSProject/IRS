@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-16 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Vehicles <a href="{{route('vehicle.create')}}" class="btn btn-link"><i class="glyphicon glyphicon-plus"></i></a></div>

                <div class="panel-body">
		    <table class="table table-striped">
			<thead>
			    <th>Plate #: </th>
			    <th>Plate Code: </th>
			    <th>Brand: </th>
			    <th>Model: </th>
			    <th>Production Year: </th>
			    <th>Color: </th>
			    <th>Chasis Number: </th>
			    <th>Engine Number: </th>
			    <th>Aquisition Date: </th>
			    <th>Type: </th>
			    <th>Operation Year: </th>
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
