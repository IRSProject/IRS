@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
		    <form action="{{ route('vehicle.update') }}" method="post">
			<input type="hidden" name="_method" value="patch" />
			<input type="hidden" name="id" value="{{$vehicle->id}}" />
			{{ csrf_field() }}

			<div class="col-xs-12 col-sm-12 col-md-12">
		   	  <div class="form-group">
			   <strong>Plate Number</strong>
			   <input name="plate_number" value="{{$vehicle->plate_number}}" type="text" class="form-control" placeholder="plate_number">
		  	  </div>
	       		</div>

			<div class="col-xs-12 col-sm-12 col-md-12">
		   	  <div class="form-group">
			   <strong>Plate Code</strong>
			   <select name="plate_code" value="{{$vehicle->plate_code}}" type="text" class="form-control" placeholder="plate_code">
					<option value="--">--</option>
                    <option value="*">*</option>
                    <option value="b">B</option>
                    <option value="g">G</option>
                    <option value="m">M</option>
                    <option value="n">N</option>
                    <option value="o">O</option>
                    <option value="s">S</option>
                    <option value="t">t</option>
                    <option value="z">z</option>
			   </select>
		  	  </div>
	       		</div>

	       	<div class="col-xs-12 col-sm-12 col-md-12">
		   	  <div class="form-group">
			   <strong>Brand</strong>
			   <input name="brand" value="{{$vehicle->brand}}" type="text" class="form-control" placeholder="brand">
		  	  </div>
	       		</div>

	       	<div class="col-xs-12 col-sm-12 col-md-12">
		   	  <div class="form-group">
			   <strong>Model</strong>
			   <input name="model" value="{{$vehicle->model}}" type="text" class="form-control" placeholder="model">
		  	  </div>
	       		</div>

	       	<div class="col-xs-12 col-sm-12 col-md-12">
		   	  <div class="form-group">
			   <strong>Production Year</strong>
			   <input name="production_year" value="{{$vehicle->production_year}}" type="text" class="form-control" placeholder="production_year">
		  	  </div>
	       		</div>

	       	<div class="col-xs-12 col-sm-12 col-md-12">
		   	  <div class="form-group">
			   <strong>Color</strong>
			   <input name="color" value="{{$vehicle->color}}" type="text" class="form-control" placeholder="color">
		  	  </div>
	       		</div>

	       	<div class="col-xs-12 col-sm-12 col-md-12">
		   	  <div class="form-group">
			   <strong>Chasis Number</strong>
			   <input name="chassis_number" value="{{$vehicle->chassis_number}}" type="text" class="form-control" placeholder="chassis_number">
		  	  </div>
	       		</div>

	       	<div class="col-xs-12 col-sm-12 col-md-12">
		   	  <div class="form-group">
			   <strong>Engine Number</strong>
			   <input name="engine_number" value="{{$vehicle->engine_number}}" type="text" class="form-control" placeholder="engine_number">
		  	  </div>
	       		</div>

	       	<div class="col-xs-12 col-sm-12 col-md-12">
		   	  <div class="form-group">
			   <strong>Aquisition Date</strong>
			   <input name="aquisition_date" value="{{$vehicle->aquisition_date}}" type="text" class="form-control" placeholder="aquisition_date">
		  	  </div>
	       		</div>

	       	<div class="col-xs-12 col-sm-12 col-md-12">
		   	  <div class="form-group">
			   <strong>Type</strong>
			   <input name="type" value="{{$vehicle->type}}" type="text" class="form-control" placeholder="type">
		  	  </div>
	       		</div>

			<div class="col-xs-12 col-sm-12 col-md-12">
		   	  <div class="form-group">
		           <strong>Operation Year</strong>
		           <input name="operation_year" value="{{$vehicle->operation_year}}" type="text" class="form-control" placeholder="operation_year">
		  	  </div>
	       		 </div>

			<div class="col-xs-12 col-sm-12 col-md-12 text-center">
			  <button type="submit" class="btn btn-primary">Submit</button>
			</ div>
		    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
