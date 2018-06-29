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
				<td><b>Name</td>
				<td><b>Quantity</b></td>
				<td><b>Quantity In</b></td>
				<td><b>Quantity Out</b></td>
				<td></td>
			</tr>
			@foreach( $items as $item )
			<form action="{{ url('warehouse/inventory_in_out', $item->id) }}" method="post">
				{{ csrf_field() }}
				<tr>
					<td>{{ ucwords($item->name) }}</td>
					<td>{{ $item->pivot->qty }}</td>
					<td>
						<input type="text" name="in" value="0">
					</td>
					<td>
						<input type="text" name="out" value="0">
					</td>
					<td>
						<input type="submit" value="In/Out" class="btn btn-primary">
					</td>
				</tr>
			</form>
				
			@endforeach	
		</table>
		<hr>
	</div>
</body>
</html>
