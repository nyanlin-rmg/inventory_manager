@extends('layouts.default')
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="container">
		<form action="{{ url('items/search') }}" method="POST">
			{{csrf_field()}}
			<input type="text" name="search" class="form-control search" placeholder="Search" value="{{ $search }}" required="">
		</form>
	</div>
	<div class="container">
		<table class="table">
			<tr>
				<td><b>Name</b></td>
				<td><b>Price</b></td>
				<td width="180px"><b>Action</b></td>
			</tr>
			@forelse($search_items as $search_item)
			<tr>
				<td>{{ ucwords($search_item->name) }}</td>
				<td>{{ ucwords($search_item->price) }}</td>
				<td><a href="{{ route('items.edit', $search_item->id) }}" class="btn btn-primary">Edit</a>
					<form action="{{ route('items.destroy', $search_item->id) }}" method="post" style="display: inline;">
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
		<a href="{{url('items')}}" class="btn btn-primary">Back</a>
	</div>
</body>
</html>