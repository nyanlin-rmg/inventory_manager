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
				<td><b>Item Name</td>
				<td><b>QTY</b></td>
			</tr>
			@foreach( $warehouse as $warehouse )
				
			<tr>
				<td>
					{{ $warehouse->name }}
				</td>
				<td>
					{{ $warehouse->pivot->qty }}
				</td>
			</tr>
				
			@endforeach	
		</table>
		<hr>
	</div>
</body>
</html>
