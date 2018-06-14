@extends('design')
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		div {
			margin-top: 10px;
		}
	</style>
	<title>Warehouse</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<form action="{{ url('warehouse/update') }}" method="post">
				{{csrf_field()}}
				<input type="hidden" name="id" value="{{ $warehouse->id }}">
				<p><input type="text" name="name" value="{{ $warehouse->name }}"></p>
				<p><input type="text" name="location" value="{{ $warehouse->location }}"></p>
				<p><input type="submit" value="Edit" class="btn btn-primary"></p>
			</form>
		</div>
	</div>
</body>
</html>