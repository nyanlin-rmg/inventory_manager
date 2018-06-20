@extends('layouts.default')
<!DOCTYPE html>
<html>
<head>	
	<title></title>
</head>
<body>
	<div class="container">
		<div class="row">
			<form action="{{ url('item/update', $item->id) }}" method="post">
				{{csrf_field()}}
				
				<input type="hidden" name="id" value="{{ $item->id }}"><br>
				<label>Name:</label>
				<input type="text" name="name" value="{{ $item->name }}" class="form form-control"><br>
				<label>Quantity:</label>
				<input type="text" name="qty" value="{{ $item->warehouses->pivot->qty}}" class="form form-control"><br>
				<input type="submit" value="Update" class="btn btn-primary">
			</form>
		</div>
	</div>
</body>
</html>