@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Station</div>

                <div class="panel-body">
		    <form action="{{ route('station.store') }}" method="post">
			{{ csrf_field() }}
                        <div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
				<br />
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" requir	ed autofocus>
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
				<br />
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
