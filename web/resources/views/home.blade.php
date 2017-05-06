@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <!-- <div class="panel panel-default">
                <div class="panel-heading">Home</div>
                <div class="panel-body">
                    You are logged in!
                </div>
            </div> -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Your Vehicles
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                              <div class="row">
                                <div class="col-sm-6">
                                  <div class="dataTables_length" id="dataTables-example_length">
                                    <label>Show
                                      <select name="dataTables-example_length" aria-controls="dataTables-example" class="form-control input-sm">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                      </select> entries
                                    </label>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-12">
                                  <table width="100%" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info" style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                      <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 143px;">Plate Number</th>
                                      <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 176px;">Plate Code</th>
                                      <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 160px;">Brand</th>
                                      <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 124px;">Model</th>
                                      <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 92px;">Year</th>
                                    </tr>
                                </thead>
                                <tbody method="post">
                                  @foreach(App\Vehicle::all() as $vehicle)
                                    <tr class="gradeA odd" role="row">
                                      <td class="sorting_1">{{$vehicle->plate_number}}</td>
                                      <td>{{$vehicle->plate_code}}</td>
                                      <td>{{$vehicle->brand}}</td>
                                      <td class="center">{{$vehicle->model}}</td>
                                      <td class="center">{{$vehicle->production_year}}</td>
                                    </tr>
                                  @endforeach
                                </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
    </div>
</div>
@endsection
