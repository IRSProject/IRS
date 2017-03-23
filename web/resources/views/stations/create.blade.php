@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
		    <form action="{{ route('station.store') }}" method="post">
			{{ csrf_field() }}
                        <div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <select id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
								  <option value="hadath">Hadath</option>
								  <option value="saida">Saida</option>
								  <option value="tripoli">Tripoli</option>
								  <option value="zahle">Zahle</option>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
				</select><br />
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                <select id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" requir	ed autofocus>
								  <option value="hadath">Beirut, Hadath, Between Jamouss Street and Kafaat School.</option>
								  <option value="saida">Saida, Ghazieh, Near army point, facing op Line.</option>
								  <option value="tripoli">Tripoli, Mejdlaya, near Nafaa.</option>
								  <option value="zahle">Zahle, Maalaka, facing (Difaa Madani).</option>
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
				</select><br />
                            </div>
                        </div>
			<div class="col-xs-12 col-sm-12 col-md-12 text-center">
			  <input type="submit" value="save" class="btn btn-success" />
			</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
