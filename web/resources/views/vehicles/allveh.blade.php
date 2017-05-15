@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">All Vehicles</div>

                <div class="panel-body">
                  <table class="table table-striped">
                    <thead>
                      <tr>
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
                      </tr>
                    </thead>
                    <tbody>
                      @foreach(App\Vehicle::all() as $vehicle)
                        <tr>
                          <td>{{ $vehicle->plate_number }}
                          <td>{{ $vehicle->plate_code }}
                          <td>{{ $vehicle->brand }}
                          <td>{{ $vehicle->model }}
                          <td>{{ $vehicle->production_year  }}
                          <td>{{ $vehicle->color  }}
                          <td>{{ $vehicle->chassis_number  }}
                          <td>{{ $vehicle->engine_number  }}
                          <td>{{ $vehicle->aquisition_date  }}
                          <td>{{ $vehicle->type  }}
                          <td>{{ $vehicle->operation_year }}</td>
                          <td>
                            <form action="{{route('vehicle.delete')}}" method="POST">
                              <a href="{{route('vehicle.edit', ['id' => $vehicle->id])}}" class="btn btn-primary btn-xs glyphicon glyphicon-pencil"></a>
                              {{csrf_field()}}
                              <input type="hidden" name="_method" value="DELETE" />
                              <input type="hidden" name="id" value="{{$vehicle->id}}" />
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
