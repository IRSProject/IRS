@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Vehicle</div>

                <div class="panel-body">
		    <form action="{{ route('vehicle.store') }}" method="post">
			{{ csrf_field() }}

			<div class="form-group{{ $errors->has('plate_number') ? ' has-error' : '' }}">
                            <label for="plate_number" class="col-md-4 control-label">Plate Number</label>

                            <div class="col-md-6">
                                <input id="plate_number" type="text" class="form-control" name="plate_number" value="{{ old('plate_number') }}" required autofocus>

                                @if ($errors->has('plate_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('plate_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
			<div class="form-group{{ $errors->has('plate_code') ? ' has-error' : '' }}">
                            <label for="plate_code" class="col-md-4 control-label">Plate Code</label>

                            <div class="col-md-6">
                                <select id="plate_code" type="text" class="form-control" name="plate_code" value="{{ old('plate_code') }}" required autofocus>
									 <option value="--">--</option>
									 <option value="*">*</option>
									 <option value="b">B</option>
									 <option value="g">G</option>
									 <option value="m">M</option>
									 <option value="n">N</option>
									 <option value="o">O</option>
									 <option value="s">S</option>
									 <option value="t">T</option>
									 <option value="z">Z</option>
								</select>

                                @if ($errors->has('plate_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('plate_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
			<div class="form-group{{ $errors->has('brand') ? ' has-error' : '' }}">
                            <label for="brand" class="col-md-4 control-label">Brand</label>

                            <div class="col-md-6">
                                <input id="brand" type="text" class="form-control" name="brand" value="{{ old('brand') }}" required autofocus>

                                @if ($errors->has('brand'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('brand') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
			<div class="form-group{{ $errors->has('model') ? ' has-error' : '' }}">
                            <label for="model" class="col-md-4 control-label">Model</label>

                            <div class="col-md-6">
                                <input id="model" type="text" class="form-control" name="model" value="{{ old('model') }}" required autofocus>

                                @if ($errors->has('model'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('model') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
			<div class="form-group{{ $errors->has('production_year') ? ' has-error' : '' }}">
                            <label for="production_year" class="col-md-4 control-label">Production Year</label>

                            <div class="col-md-6">
                                <input id="production_year" type="text" class="form-control" name="production_year" value="{{ old('production_year') }}" required autofocus>

                                @if ($errors->has('production_year'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('production_year') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
			<div class="form-group{{ $errors->has('color') ? ' has-error' : '' }}">
                            <label for="color" class="col-md-4 control-label">Color</label>

                            <div class="col-md-6">
                                <input id="color" type="text" class="form-control" name="color" value="{{ old('color') }}" required autofocus>

                                @if ($errors->has('color'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('color') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
			<div class="form-group{{ $errors->has('chassis_number') ? ' has-error' : '' }}">
                            <label for="chassis_number" class="col-md-4 control-label">Chassis Number</label>

                            <div class="col-md-6">
                                <input id="chassis_number" type="text" class="form-control" name="chassis_number" value="{{ old('chassis_number') }}" required autofocus>

                                @if ($errors->has('chassis_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('chassis_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
			<div class="form-group{{ $errors->has('engine_number') ? ' has-error' : '' }}">
                            <label for="engine_number" class="col-md-4 control-label">Engine Number</label>

                            <div class="col-md-6">
                                <input id="engine_number" type="text" class="form-control" name="engine_number" value="{{ old('engine_number') }}" required autofocus>

                                @if ($errors->has('engine_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('engine_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
			<div class="form-group{{ $errors->has('aquisition_date') ? ' has-error' : '' }}">
                            <label for="aquisition_date" class="col-md-4 control-label">Aquisition Date</label>

                            <div class="col-md-6">
                                <input id="aquisition_date" type="date" class="form-control" name="aquisition_date" value="{{ old('aquisition_date') }}" required autofocus>

                                @if ($errors->has('aquisition_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('aquisition_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
			<div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                            <label for="type" class="col-md-4 control-label">Type</label>

                            <div class="col-md-6">
                                <input id="type" type="text" class="form-control" name="type" value="{{ old('type') }}" required autofocus>

                                @if ($errors->has('type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
			<div class="form-group{{ $errors->has('operation_year') ? ' has-error' : '' }}">
                            <label for="operation_year" class="col-md-4 control-label">Operation Year</label>

                            <div class="col-md-6">
                                <input id="operation_year" type="text" class="form-control" name="operation_year" value="{{ old('operation_year') }}" required autofocus>

                                @if ($errors->has('operation_year'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('operation_year') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
			<div class="col-xs-12 col-sm-12 col-md-12 text-center">
			  <input type="submit" value="save" class="btn btn-success" />
			</div>
		    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
