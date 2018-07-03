@extends('layouts.app')
@section('content')
	<table class="table table-striped">
		<tr>
			<td><b>Category Name</b></td>
		</tr>
		@foreach( $categories as $category )
			@foreach( $category as $name )
		<tr>
			<td><a href="{{ url('warehouses/showItems'.'/'. $name->id . '/' . $wid) }}">
				<input type="hidden" name="categoryid" value="{{ $name->id }}" >
				{{ $name->name }}
			</a></td>
		</tr>
			@endforeach
		@endforeach	
	</table>
	<a href="{{ url('warehouses') }}" class="btn btn-primary">Back</a>
@endsection