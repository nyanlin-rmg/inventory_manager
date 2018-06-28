@extends('layouts.default')
<!DOCTYPE html>
<html>
<head>	
</head>
<body>
	<div class="container">
		<table class="table table-striped">
			<tr>
				<td><b>Name</b></td>
				<td><b>Qty</b></td>
			</tr>
			@foreach ($items as $item)
			<tr>
				<td>
					
					{{ $item->name }}
					
				</td>
			</tr>
			@endforeach
		</table>
	</div>
</body>
</html>