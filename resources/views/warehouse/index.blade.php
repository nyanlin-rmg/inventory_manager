@extends('design')
<!DOCTYPE html>
<html>
<head>
	<title>Warehouse</title>
</head>
<body>
	<div class="container">
		<table class="table">
			<tr>
				<td><b>Name</b></td>
				<td><b>Location</b></td>
			</tr>
			@foreach($warehouses as $warehouse)
			<tr>
				<td><a href="{{ url('warehouse/show', $warehouse->id) }}">{{ ucwords($warehouse->name) }}</a></td>
				<td>{{ ucwords($warehouse->location) }}</td>
				<td><a href="{{ url('warehouse/edit', $warehouse->id) }}" class="btn btn-primary">Edit</a></td>
				<td><a href="{{ url('warehouse/destroy', $warehouse->id) }}" class="btn btn-danger">Delete</a></td>
			</tr>
			@endforeach
		</table>
		<hr>
		<a href="{{ url('warehouse/create') }}" class="btn btn-info">Create Warehouse</a>
	</div>
</body>
</html>