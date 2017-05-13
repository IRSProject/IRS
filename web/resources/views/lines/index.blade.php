@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
		<div class="panel-heading">Lines
      @if ( Auth::user() && Auth::user()->role == 'admin' )
		<a href="{{route('line.create')}}" class="btn btn-link"><i class="glyphicon glyphicon-plus"></i></a>
    @endif
  </div>

                <div class="panel-body">
		    <table class="table table-striped">
			<thead>
			  <tr>
			    <th>Line Number</th>
			    <th>Station Name</th>
          @if ( Auth::user() && Auth::user()->role == 'admin' )
			    <th>Actions</th>
          @endif
			  </tr>
			</thead>
			<tbody>
			@foreach($lines as $line)
			  <tr>
			      <td>{{$line->number}}</td>
			      <td>{{$line->station->name}}</td>
            @if ( Auth::user() && Auth::user()->role == 'admin' )
			      <td>

				<form action="{{route('line.delete')}}" method="POST">
				<a href="{{route('line.edit', ['id' => $line->id])}}" class="btn btn-primary btn-xs glyphicon glyphicon-pencil"></a>
				    {{csrf_field()}}
				    <input type="hidden" name="_method" value="DELETE" />
				    <input type="hidden" name="id" value="{{$line->id}}" />
            <button class="btn btn-danger btn-xs glyphicon glyphicon-trash" data-title="Delete" data-toggle="modal" data-target="#delete"></button>
				</form>
			      </td>
            @endif
            
			  </tr>
			@endforeach
			</tbody>
		    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
