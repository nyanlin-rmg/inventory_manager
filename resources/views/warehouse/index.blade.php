@extends('layouts.default')
@section('content')
		<form action="{{ url('warehouses/search') }}" method="POST">
			{{csrf_field()}}
			<input type="text" name="search" class="form-control search" placeholder="Search" required>
		</form>
	</div>
	<div class="container">
		<table class="table">
			<tr>
				<th> Name </th>
				<th> Location </th>
				<th width="180px"> Action </th>
			</tr>
			@foreach($warehouses as $warehouse)
			<tr>
				<td><a href="{{ route('warehouses.show', $warehouse->id) }}">{{ ucwords($warehouse->name) }}</a></td>
				<td>{{ ucwords($warehouse->location) }}</td>
				<td>
					<a href="{{ route('warehouses.edit', $warehouse->id) }}" class="btn btn-success">Edit</a>
					<form action="{{ route('warehouses.destroy', $warehouse->id) }}" method="post" style="display: inline;">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<button class="btn btn-danger">Delete</button>
					</form>
				</td>
			</tr>
			@endforeach
		</table>
		{{ $warehouses->links() }} <br>
		<a href="{{ route('warehouses.create') }}" class="btn btn-primary">Create Warehouse</a>
		<a href="{{ url('warehouses/purchase') }}" class="btn btn-primary">Purchase</a>
@endsection
