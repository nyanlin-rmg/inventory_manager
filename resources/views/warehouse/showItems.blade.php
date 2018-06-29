@extends('layouts.default')
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		div {
    		padding-top:20px;
		}
	</style>
</head>
<body>
	<div class="container">
		<a href="{{ url('items/create') }}" class="btn btn-primary">Create Item</a>
		<table class="table table-striped">
			<tr>
				<td><b>Name</b></td>
				<td><b>Quantity</b></td>
<<<<<<< HEAD
				<td><b>Quantity In</b></td>
				<td><b>Quantity Out</b></td>
				<td></td>
=======
				<td> </td>
>>>>>>> 0dc7186a5a082f36e8891b275a135d0f33992727
			</tr>
			@foreach( $items as $item )
			<form action="{{ url('warehouses/inventory_in_out', $item->id) }}" method="post">
				{{ csrf_field() }}
				<tr>
					<td>{{ ucwords($item->name) }}</td>
					<td>{{ $item->pivot->qty }}</td>					
				</tr>
			</form>
			@endforeach	
		</table>
		<hr>
		<a href="{{ url('warehouses') }}" class="btn btn-primary">Back</a>
	</div>
</body>
</html>
