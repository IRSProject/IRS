@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Appointment <a href="{{route('appointment.create')}}" class="btn btn-link"><i class="glyphicon glyphicon-plus"></i></a></div>

                <div class="panel-body">
		    <table class="table table-striped">
			<thead>
			  <tr>
			    <th>Appointment Date</th>
			    <th>Appointment Time</th>
			    <th>Actions</th>
			  </tr>
			</thead>
			<tbody>
			@foreach($appointments as $appointment)
			  <tr>
			      <td><a href="{{route('appointment.station', 'appointment.line' , ['appointment' => $appointment->id])}}">{{$appointment->date}}</a>< 					td>
			      <td>{{$appointment->time}}</td>
			      <td>
				<a href="{{route('appointment.edit', ['id' => $appointment->id])}}" class="btn btn-success"> Edit </a>
				<form action="{{route('appointment.delete')}}" method="POST">
				    {{csrf_field()}}
				    <input type="hidden" name="_method" value="DELETE" />
				    <input type="hidden" name="id" value="{{$appointment->id}}" />
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
