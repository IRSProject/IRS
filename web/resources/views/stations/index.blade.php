@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Stations <a href="{{route('station.create')}}" class="btn btn-link"><i class="fa fa-plus"></i></a></div>

                <div class="panel-body">
		    <table class="table table-striped">
			<thead>
			  <tr>
			    <th>Station Name</th>
			    <th>Station Address</th>
			    <th>Actions</th>
			  </tr>
			</thead>
			<tbody>
			@foreach($stations as $station)
			  <tr>
			      <td><a href="{{route('station.lines', ['station' => $station->id])}}">{{$station->name}}</a></td>
			      <td>{{$station->address}}</td>
			      <td>
				<a href="{{route('station.edit', ['id' => $station->id])}}" class="btn btn-success"> Edit </a>
				<form action="{{route('station.delete')}}" method="POST">
				    {{csrf_field()}}
				    <input type="hidden" name="_method" value="DELETE" />
				    <input type="hidden" name="id" value="{{$station->id}}" />
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
