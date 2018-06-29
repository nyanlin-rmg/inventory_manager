@extends('layouts.default')
<!DOCTYPE html>
<html>
<head>	
	<title></title>
</head>
<body>
	<div class="container">
		<div class="row">
			<form action="{{ route('items.update', $item->id) }}" method="post">
				{{csrf_field()}}
				{{ method_field('PUT') }}

				<input type="hidden" name="id" value="{{ $item->id }}">
				<div class="form-group">
					<label>Name:</label>
					<input type="text" name="name" value="{{ $item->name }}" class="form-control">
				</div>
				
				<div class="form-group">
					<label>Price:</label>
					<input type="text" name="price" value="{{ $item->price }}" class="form-control">
				</div>
				
				
				<div class="form-group">
					<input type="submit" value="Update" class="btn btn-primary">
					<a href="{{ route('items.index') }}" class="btn btn-danger">Cancel</a>
				</div>
			</form>
		</div>
	</div>
</body>
</html>
