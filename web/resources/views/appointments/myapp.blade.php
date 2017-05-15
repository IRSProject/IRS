@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">My Appointments</div>

                <div class="panel-body">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Vehicle</th>
                        <th>Date</th>
                        <th>Station</th>
                        <th>Line Number</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach(App\Appointment::all() as $appointment)
                        <tr>
                          <td>{{ $appointment->title }}</td>
                          <td>{{ $appointment->start }}</td>
                          <td>{{ $appointment->station_id }}</td>
                          <td>{{ $appointment->resourceId }}</td>
                          <td>
                            <form action="{{route('appointment.delete')}}" method="POST">
                              {{csrf_field()}}
                              <input type="hidden" name="_method" value="DELETE" />
                              <input type="hidden" name="id" value="{{$appointment->id}}" />
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
