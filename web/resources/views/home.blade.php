@extends('layouts.app')

@section('content')
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
                                    <i class="fa fa-comments fa-5x"></i>
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
                                    <i class="fa fa-tasks fa-5x"></i>
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
                                    <i class="fa fa-shopping-cart fa-5x"></i>
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
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{ App\User::count() }}</div>
                                    <div>Number of Users</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
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
              <div class="col-lg-8">
                  <!-- /.panel -->
                  <div class="panel panel-default">
                      <div class="panel-heading">How to use</div>
                      <!-- /.panel-heading -->
                      <div class="panel-body">
                          <ul class="timeline">
                              <li>
                                  <div class="timeline-badge"><i class="fa fa-check"></i>
                                  </div>
                                  <div class="timeline-panel">
                                      <div class="timeline-heading">
                                          <h4 class="timeline-title">Add your vehicle</h4>
                                          <p><small class="text-muted"><i class="fa fa-clock-o"></i> 11 hours ago via Twitter</small>
                                          </p>
                                      </div>
                                      <div class="timeline-body">
                                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero laboriosam dolor perspiciatis omnis exercitationem. Beatae, officia pariatur? Est cum veniam excepturi. Maiores praesentium, porro voluptas suscipit facere rem dicta, debitis.</p>
                                      </div>
                                  </div>
                              </li>
                              <li class="timeline-inverted">
                                  <div class="timeline-badge warning"><i class="fa fa-credit-card"></i>
                                  </div>
                                  <div class="timeline-panel">
                                      <div class="timeline-heading">
                                          <h4 class="timeline-title">Know what station you want to book your appointment in</h4>
                                      </div>
                                      <div class="timeline-body">
                                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem dolorem quibusdam, tenetur commodi provident cumque magni voluptatem libero, quis rerum. Fugiat esse debitis optio, tempore. Animi officiis alias, officia repellendus.</p>
                                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium maiores odit qui est tempora eos, nostrum provident explicabo dignissimos debitis vel! Adipisci eius voluptates, ad aut recusandae minus eaque facere.</p>
                                      </div>
                                  </div>
                              </li>
                              <li>
                                  <div class="timeline-badge danger"><i class="fa fa-bomb"></i>
                                  </div>
                                  <div class="timeline-panel">
                                      <div class="timeline-heading">
                                          <h4 class="timeline-title">Generate appointment</h4>
                                      </div>
                                      <div class="timeline-body">
                                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus numquam facilis enim eaque, tenetur nam id qui vel velit similique nihil iure molestias aliquam, voluptatem totam quaerat, magni commodi quisquam.</p>
                                      </div>
                                  </div>
                              </li>
                              <li class="timeline-inverted">
                                  <div class="timeline-panel">
                                      <div class="timeline-heading">
                                          <h4 class="timeline-title">Pick a date & time</h4>
                                      </div>
                                      <div class="timeline-body">
                                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates est quaerat asperiores sapiente, eligendi, nihil. Itaque quos, alias sapiente rerum quas odit! Aperiam officiis quidem delectus libero, omnis ut debitis!</p>
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
                                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis minus modi quam ipsum alias at est molestiae excepturi delectus nesciunt, quibusdam debitis amet, beatae consequuntur impedit nulla qui! Laborum, atque.</p>
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
