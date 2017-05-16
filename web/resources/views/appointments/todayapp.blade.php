@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Today's Appointments</div>

                <div class="panel-body">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Vehicle</th>
                        <th>Appointment Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach(App\Appointment::all() as $appointment)
                        <tr>
                          <td>{{ $appointment->title }}</td>
                          <td>{{ $appointment->start }}</td>
                          <td>{{ $appointment->status }}</td>
                          <td>
                          <a href="{{ route('appointment.pass' , ['id' => $appointment->id])}}" class="btn btn-success btn-xs glyphicon glyphicon-ok"></a>
                          <a href="{{ route('appointment.fail' , ['id' => $appointment->id])}}" class="btn btn-danger btn-xs glyphicon glyphicon-remove"></a>
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
