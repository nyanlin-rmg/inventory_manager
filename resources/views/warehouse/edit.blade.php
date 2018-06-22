@extends('layouts.default')
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
			<form action="{{ route('warehouse.update', $warehouse->id) }}" method="post">
				{{csrf_field()}}
				{{method_field('PUT')}}
				<input type="hidden" name="id" value="{{ $warehouse->id }}">
				<p><input type="text" name="name" value="{{ $warehouse->name }}" class="form form-control"></p>
				<p><textarea name="location" class="form form-control">{{ $warehouse->location }}</textarea></p>
				<p><input type="submit" value="Edit" class="btn btn-primary"></p>
			</form>
		</div>
	</div>
</body>
</html>