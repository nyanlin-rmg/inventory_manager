@extends('layouts.app')
@section('content')
	<table class="table">
		@foreach($warehouses as $warehouse)
		<tr>
			<td><a href="{{ url('warehouses/sale_items', $warehouse->id) }}">{{ ucwords($warehouse->name) }}</a></td>
			<td>{{ ucwords($warehouse->location) }}</td>
		</tr>
		@endforeach
	</table>
	<a href="{{ url('warehouses')}}" class="btn btn-primary">Back</a>
@endsection