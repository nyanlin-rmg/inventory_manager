<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="container">
		<table class="table">
			<tr>
				<td><b>Category Name</b></td>
			</tr>
			@foreach( $categories as $category )
				@foreach( $category as $name )
			<tr>
				<td><a href="{{ url('warehouse/showItems', $warehouse->id) }}"> 
					<input type="hidden" name="categoryid" value="{{ $name->id }}" >
					{{ $name->name }}
				</a></td>
			</tr>
				@endforeach
			@endforeach	
		</table>
		<hr>
	</div>
</body>
</html>
