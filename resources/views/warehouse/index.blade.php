@extends('layouts.default')
<!DOCTYPE html>
<html>
<head>
	<title>Warehouse</title>
</head>
<body>
	<div class="container">
		<form action="{{ url('warehouse/search') }}" method="POST">
			{{csrf_field()}}
			<table class="table">
				<tr>
					<td>
						<input type="text" name="search" class="form-control" placeholder="Search" required="">
					</td>
					
				</tr>
			</table>
		</form>
	</div>
	<div class="container">
		<table class="table">
			<tr>
				<td><b>Name</b></td>
				<td><b>Location</b></td>
				<td></td>
				<td></td>
			</tr>
			@foreach($warehouses as $warehouse)
			<tr>
				<td><a href="{{ route('warehouse.show', $warehouse->id) }}">{{ ucwords($warehouse->name) }}</a></td>
				<td>{{ ucwords($warehouse->location) }}</td>
				<td><a href="{{ route('warehouse.edit', $warehouse->id) }}" class="btn btn-primary">Edit</a></td>
				<td>
					<form action="{{ route('warehouse.destroy', $warehouse->id) }}" method="post">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<button class="btn btn-danger">Delete</button>
					</form>
				</td>
			</tr>
			@endforeach
		</table>
		<hr>
		<a href="{{ url('warehouse/create') }}" class="btn btn-info">Create Warehouse</a>
		<a href="{{ url('/purchase') }}" class="btn btn-info">Purchase</a>
	</div>
</body>
</html>