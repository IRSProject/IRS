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
			<input name="name" type="text" class="form-control" placeholder="name" />
			<input name="address" type="text" class="form-control" placeholder="address" />
			<input type="submit" />
		    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
