@extends('layouts.default')
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="container">
		<table class="table table-striped">
			<tr>
				<td><b>Name</b></td>
				<td><b>Quantity</b></td>
				<td> </td>
			</tr>
			@foreach( $items as $item )
			<form action="{{ url('warehouse/inventory_in_out', $item->id) }}" method="post">
				{{ csrf_field() }}
				<tr>
					<td>{{ ucwords($item->name) }}</td>
					<td>{{ $item->pivot->qty }}</td>
					
				</tr>
			</form>
				
			@endforeach	
		</table>
		<hr>
	</div>
</body>
</html>
