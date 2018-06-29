@extends('layouts.default')
@include('header')
<!DOCTYPE html>
<html>
<head>
	<title>Warehouse</title>
</head>
<body>
	<div class="container">
		<form action="{{ url('warehouse/search') }}" method="POST">
			{{csrf_field()}}
			<input type="text" name="search" class="form-control search" placeholder="Search" required="">
		</form>
	</div>
	<div class="container">
		@if ($message = Session::get('success'))
		<div class="alert alert-success">
		<p>{{ $message }}</p>
		</div>
	@endif
		<table class="table">
			<tr>
				<th> Name </th>
				<th> Location </th>
				<th width="180px"> Action </th>
			</tr>
			@foreach($warehouses as $warehouse)
			<tr>
				<td><a href="{{ route('warehouse.show', $warehouse->id) }}">{{ ucwords($warehouse->name) }}</a></td>
				<td>{{ ucwords($warehouse->location) }}</td>
				<td>
					<a href="{{ route('warehouse.edit', $warehouse->id) }}" class="btn btn-success">Edit</a>
					<form action="{{ route('warehouse.destroy', $warehouse->id) }}" method="post" style="display: inline;">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<button class="btn btn-danger">Delete</button>
					</form>
				</td>
			</tr>
			@endforeach
		</table>
		<hr>
		<a href="{{ route('warehouse.create') }}" class="btn btn-primary">Create</a>
		<a href="{{ url('warehouse/purchase') }}" class="btn btn-primary">Purchase</a>
	</div>
</body>
</html>
