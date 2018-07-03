@extends('layouts.app')
@section('content')
	<div class="container">
		<form action="{{ url('warehouses/search') }}" method="POST">
			{{csrf_field()}}
			<input type="text" name="search" class="form-control search" placeholder="Search" value="{{ $search }}" required="">
		</form>
	</div>
	<div class="container">
		<table class="table">
			<tr>
				<td><b>Name</b></td>
				<td><b>Location</b></td>
				<td width="180px"><b>Action</b></td>
			</tr>
			@forelse($search_warehouses as $search_warehouse)
			<tr>
				<td><a href="{{ route('warehouses.show', $search_warehouse->id) }}">{{ ucwords($search_warehouse->name) }}</a></td>
				<td>{{ ucwords($search_warehouse->location) }}</td>
				<td><a href="{{ route('warehouses.edit', $search_warehouse->id) }}" class="btn btn-primary">Edit</a>
					<form action="{{ route('warehouses.destroy', $search_warehouse->id) }}" method="post" style="display: inline;">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<button class="btn btn-danger">Delete</button>
					</form>
				</td>
			</tr>
		@empty
		<tr>
			<td class="warning">There is no item you are searching for!</td>
			<td class="warning"></td>
			<td class="warning"></td>
			<td class="warning"></td>
		</tr>
		@endforelse
		</table>
		<a href="{{url('warehouses')}}" class="btn btn-primary">Back</a>
@endsection