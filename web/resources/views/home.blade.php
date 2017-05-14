@extends('layouts.app')

@section('content')
<style>
span.highlight {
    background-color: black;
    color: grey;
}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
             <div class="panel panel-default">
                <div class="panel-heading">Home</div>
                <div class="panel-body">
                    <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-home fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{ App\Station::count() }}</div>
                                    <div>Number of Stations</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('station.index')}}">
                            <div class="panel-footer">
                                <span class="pull-left">View Stations</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-car fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{ App\Vehicle::count() }}</div>
                                    <div>Number of Vehicles</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('vehicle.index')}}">
                            <div class="panel-footer">
                                <span class="pull-left">View Vehicles</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-list-ul fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{ App\Appointment::count() }}</div>
                                    <div>Number of Appointments</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('appointment.index')}}">
                            <div class="panel-footer">
                                <span class="pull-left">View Appointments</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{ App\User::count() }}</div>
                                    <div>Number of Users</div>
                                </div>
                            </div>
                        </div>
                        @if ( Auth::user() && Auth::user()->role == 'admin' )
                        <a href="{{route('user.index')}}">
                            @endif
                            <div class="panel-footer">
                                <span class="pull-left">View Users</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>

                    </div>
                </div>

              </div>
                </div>
            </div>

            <div class="row">
              <div class="col-lg-12">
                  <!-- /.panel -->
                  <div class="panel panel-default">
                      <div class="panel-heading">How to use</div>
                      <!-- /.panel-heading -->
                      <div class="panel-body">
                          <ul class="timeline">
                              <li>
                                  <div class="timeline-badge"><i class="fa fa-car"></i>
                                  </div>
                                  <div class="timeline-panel">
                                      <div class="timeline-heading">
                                          <h4 class="timeline-title">Add new vehicle</h4>
                                      </div>
                                      <div class="timeline-body">
                                          <p>
                                            1- First click on <span class="highlight">Vehicles</span> in the navigation bar.
                                          </p>
                                          <p>
                                            2- Then click on <i class="glyphicon glyphicon-plus"></i>.
                                          </p>
                                          <p>
                                            3- Fill all the information required about your vehicle.
                                          </p>
                                          <p>
                                            4- Click <input type="submit" value="Save" class="btn btn-success" />.
                                          </p>
                                      </div>
                                  </div>
                              </li>
                              <li class="timeline-inverted">
                                  <div class="timeline-badge warning"><i class="fa fa-home"></i>
                                  </div>
                                  <div class="timeline-panel">
                                      <div class="timeline-heading">
                                          <h4 class="timeline-title">Choose a station</h4>
                                      </div>
                                      <div class="timeline-body">
                                          <p>
                                            1- First click on <span class="highlight">Stations</span> in the navigation bar.
                                          </p>
                                          <p>
                                            2- Choose the station with the nearest address.
                                          </p>
                                      </div>
                                  </div>
                              </li>
                              <li>
                                  <div class="timeline-badge danger"><i class="fa fa-cog fa-spin"></i>
                                  </div>
                                  <div class="timeline-panel">
                                      <div class="timeline-heading">
                                          <h4 class="timeline-title">Generate appointment</h4>
                                      </div>
                                      <div class="timeline-body">
                                          <p>
                                            1- First click on <span class="highlight">Appointments</span> in the navigation bar.
                                          </p>
                                          <p>
                                            2- Click on <i class="glyphicon glyphicon-refresh"></i>.
                                          </p>
                                          <p>
                                            3- Fill all the information needed.
                                          </p>
                                          <p>
                                            4- Click on <input type="submit" value="Generate" class="btn btn-warning" />.
                                          </p>
                                      </div>
                                  </div>
                              </li>
                              <li class="timeline-inverted">
                                  <div class="timeline-panel">
                                      <div class="timeline-heading">
                                          <h4 class="timeline-title">Choose appointment</h4>
                                      </div>
                                      <div class="timeline-body">
                                          <p>
                                            Click on <button class="btn btn-success btn-xs glyphicon glyphicon-ok" data-title="Delete" data-toggle="modal" data-target="#delete"></button> that is on the right of your chosen appointment.
                                          </p>
                                          </p>
                                      </div>
                                  </div>
                              </li>
                              <li>
                                  <div class="timeline-badge success"><i class="fa fa-save"></i>
                                  </div>
                                  <div class="timeline-panel">
                                      <div class="timeline-heading">
                                          <h4 class="timeline-title">Appointment reserved</h4>
                                      </div>
                                      <div class="timeline-body">
                                          <p>Congratulations, your appointment has been reserved. You can either check it by clicking on <i class="glyphicon glyphicon-list"></i> or check for it in the calender.</p>
                                      </div>
                                  </div>
                              </li>
                          </ul>
                      </div>
                      <!-- /.panel-body -->
                  </div>
                  <!-- /.panel -->
              </div>
          <!-- /.col-lg-8 -->
            </div>
        </div>
    </div>
</div>
@endsection
