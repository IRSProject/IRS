@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
          		    <table class="table table-striped">
              			<thead>
              			  <tr>
              			    <th>Vehicle</th>
              			    <th>Station</th>
                        <th>Line</th>
                        <th>Date</th>
              			    <th>Actions</th>
              			  </tr>
              			</thead>
              			<tbody>
              			@foreach($appointments as $appointment)
              			  <tr>
                          @foreach($vehicles as $vehicle)
              			      <td>
                            <a href="{{$vehicle->id}}">{{$vehicle->plate_code . ' ' . $vehicle->plate_number}}</a>
                          </td>
                          @endforeach
              			      <td>
                            @foreach($stations as $station)
                           <a href="{{$station->id}}">{{ $station->name }}</a>
                           @endforeach
                         </td>
                         @foreach($lines as $line)
                         <td>
                          <a href="{{line->number}}">{{$line->number}}</a>
                         </td>
                         @endforeach
              			      <td>

              				<form action="{{route('station.delete')}}" method="POST">
              				    {{csrf_field()}}
              				    <input type="hidden" name="_method" value="DELETE" />
              				    <input type="hidden" name="id" value="{{$station->id}}" />
              				    <input type="submit" value="Delete" class="btn btn-danger" />
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
