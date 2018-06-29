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
			@forelse($search_warehouses as $search_warehouse)
			<tr>
				<td><a href="{{ route('warehouses.show', $search_warehouse->id) }}">{{ ucwords($search_warehouse->name) }}</a></td>
				<td>{{ ucwords($search_warehouse->location) }}</td>
				<td><a href="{{ route('warehouses.edit', $search_warehouse->id) }}" class="btn btn-primary">Edit</a></td>
				<td><a href="{{ route('warehouses.destroy', $search_warehouse->id) }}" class="btn btn-danger">Delete</a></td>
			</tr>
		@empty
		<tr>
			<td class="warning">There is no item you are searching for!</td>
		</tr>
		@endforelse
		</table>
		<a href="{{url('warehouse')}}" class="btn btn-primary">Back</a>
	</div>
</body>
</html>