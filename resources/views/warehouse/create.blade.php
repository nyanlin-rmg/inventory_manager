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
			<form action="{{route('warehouse.store')}}" method="post">
				{{csrf_field()}}
				<p><input type="text" name="name" placeholder="Name" class="form form-control"></p>
				<p><textarea placeholder="Location" name="location" class="form form-control"></textarea></p>
				<p><input type="submit" value="Create" class="btn btn-primary"></p>
				<a href="{{ route('warehouse.index') }}" class="btn btn-warning">Cancel</a>
			</form>			
		</div>
	</div>
</body>
</html>