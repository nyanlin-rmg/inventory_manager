<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="container">
		<table class="table">
			<tr>
				<td><b>Item Name</td>
			</tr>
			@foreach( $warehouse as $warehouse )
				
			<tr>
				<td>
					{{ $warehouse->name }}
				</td>
			</tr>
				
			@endforeach	
		</table>
		<hr>
	</div>
</body>
</html>
