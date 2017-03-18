@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
		<div class="panel-heading">Lines 
		<a href="{{route('line.create')}}" class="btn btn-link"><i class="glyphicon glyphicon-plus"></i></a></div>

                <div class="panel-body">
		    <table class="table table-striped">
			<thead>
			  <tr>
			    <th>Line Number</th>
			    <th>Station Name</th>
			    <th>Actions</th>
			  </tr>
			</thead>
			<tbody>
			@foreach($lines as $line)
			  <tr>
			      <td>{{$line->number}}</td>
			      <td>{{$line->station->name}}</td>
			      <td>
				
				<form action="{{route('line.delete')}}" method="POST">
				<a href="{{route('line.edit', ['id' => $line->id])}}" class="btn btn-success"> Edit </a>
				    {{csrf_field()}}
				    <input type="hidden" name="_method" value="DELETE" />
				    <input type="hidden" name="id" value="{{$line->id}}" />
				    <input type="submit" value="DELETE" class="btn btn-danger" />
				</form>
			      </td>
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
