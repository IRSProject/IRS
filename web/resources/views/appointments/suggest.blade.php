@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
          		<div class="panel-heading">Suggestions

                          <div class="panel-body">
				@if(count($appointments) <= 0)
				<div> No Appointments. </div>
				@else
          		    <table class="table table-striped">
          			<thead>
          			  <tr>
          			    <th>date</th>
          			    <th>Line</th>
          			    <th>Time</th>
          			    <th>Actions</th>
          			  </tr>
          			</thead>
          			<tbody>
          			@foreach($appointments as $appointment)
          			  <tr>
          			      <td>{{$appointment['date']}}</td>
          			      <td>{{$appointment['line']}}</td>
          			      <td>{{$appointment['time']}}</td>
          			      <td>

          				<form action="{{route('appointment.accept')}}" method="POST">
          				    {{csrf_field()}}
          				    <input type="hidden" name="date" value="{{$appointment['date']}}" />
          				    <input type="hidden" name="line" value="{{$appointment['line']}}" />
          				    <input type="hidden" name="time" value="{{$appointment['time']}}" />
          				    <input type="hidden" name="vehicle_id" value="{{$vehicle_id}}" />
          				    <input type="submit" value="ACCEPT" class="btn btn-success" />
          				</form>
          			      </td>
          			  </tr>
          			@endforeach
          			</tbody>
          		    </table>
			    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
