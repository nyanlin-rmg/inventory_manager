@extends('layouts.default')
<!DOCTYPE html>
<html>
<head>
	<title>Warehouse</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<form action="{{route('warehouses.store')}}" method="post">
				{{csrf_field()}}

				<div class="form-group">
					<label>Name:</label>
					<input type="text" name="name" placeholder="Name" class="form-control">
				</div>
				<div class="form-group">
					<label>Location:</label>
					<textarea placeholder="Location" name="location" class="form-control"></textarea>
				</div>
				<div class="form-group">
					<input type="submit" value="Create" class="btn btn-primary">
					<a href="{{ route('warehouses.index') }}" class="btn btn-danger">Cancel</a>
				</div>
			</form>

		</div>
	</div>
</body>
</html>