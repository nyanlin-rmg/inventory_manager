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
				<td>{{ ucwords($search_warehouse->name) }}</td>
				<td>{{ ucwords($search_warehouse->location) }}</td>
				<td><a href="{{ route('warehouse.edit', $search_warehouse->id) }}" class="btn btn-primary">Edit</a></td>
				<td>
					<form action="{{ route('warehouse.destroy', $search_warehouse->id) }}" method="post">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<button class="btn btn-danger">Delete</button>
					</form>
				</td>	
			</tr>
		@empty
		<tr>
			<td class="warning">There is no item you are searching for!</td>
		</tr>
		@endforelse
		</table>
		<a href="{{url('warehouse')}}">Go To Home</a>
	</div>
</body>
</html>