@extends('layouts.default')
<!DOCTYPE html>
<html>
<head>	
	<title></title>
</head>
<body>
	<div class="container">
		<div class="row">
			<form action="{{ route('item.update', $item->id) }}" method="post">
				{{csrf_field()}}
				{{ method_field('PUT') }}
				<input type="hidden" name="id" value="{{ $item->id }}"><br>
				<label>Name:</label>
				<input type="text" name="name" value="{{ $item->name }}" class="form form-control"><br>
				<label>Price:</label>
				<input type="number" name="price" value="{{ $item->price }}" class="form form-control"><br>
				<input type="submit" value="Update" class="btn btn-primary">
			</form>
		</div>
	</div>
</body>
</html>