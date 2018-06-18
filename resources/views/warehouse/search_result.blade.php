@extends('layouts.default')
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="container">
		<table class="table">
			<tr>
				<td><b>Name</b></td>
				<td><b>Location</b></td>
			</tr>
			@foreach($search_warehouses as $search_warehouse)
			<tr>
				<td>{{ ucwords($search_warehouse->name) }}</td>
				<td>{{ ucwords($search_warehouse->location) }}</td>
				<td><a href="{{ url('warehouse/edit', $search_warehouse->id) }}" class="btn btn-primary">Edit</a></td>
				<td><a href="{{ url('warehouse/destroy', $search_warehouse->id) }}" class="btn btn-danger">Delete</a></td>
			</tr>
		@endforeach
		</table>
		<a href="{{url('warehouse')}}" class="btn btn-primary">Go To Home</a>
	</div>
</body>
</html>