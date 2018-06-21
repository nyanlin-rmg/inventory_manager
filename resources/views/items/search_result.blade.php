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
				<td><b>Quantity</b></td>
			</tr>
			@forelse($items as $search_item)
			<tr>
				<td>{{ $search_item->name }}</td>

				<td>{{ $search_item->qty }}</td>
			 
				<td><a href="{{ url('item/edit', $search_item->id) }}" class="btn btn-primary">Edit</a></td>
				<td><a href="{{ url('item/destroy', $search_item->id) }}" class="btn btn-danger">Delete</a></td>
			</tr>
		@empty
		<tr>
			<td class="warning">There is no item you are searching for!</td>
		</tr>
		@endforelse
		</table>
		<a href="{{url('item')}}">Go To Home</a>
	</div>
</body>
</html>