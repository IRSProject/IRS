@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
		    <form action="{{ route('appointment.update') }}" method="post">
			<input type="hidden" name="_method" value="patch" />
			<input type="hidden" name="id" value="{{$appointment->id}}" />
			{{ csrf_field() }}

			<input name="date" value="{{$appointment->date}}" type="date" class="form-control" placeholder="date" />
			<input name="time" value="{{$appointment->time}}" type="time" class="form-control" placeholder="time" />
			<input type="submit" />
		    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
