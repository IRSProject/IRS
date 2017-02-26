@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
		    <form action="{{ route('line.store') }}" method="post">
			{{ csrf_field() }}
			<div class="form-group{{ $errors->has('line_number') ? ' has-error' : '' }}">
                            <label for="line_number" class="col-md-4 control-label">Line Number</label>

                            <div class="col-md-6">
                                <input id="line_number" type="integer" class="form-control" name="line_number" value="{{ old('line_number') }}" required autofocus>

                                @if ($errors->has('line_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('line_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

		    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
