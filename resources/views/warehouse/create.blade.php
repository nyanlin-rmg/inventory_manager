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
			<form action="{{url('warehouse/store')}}" method="post">
				{{csrf_field()}}
				<p><input type="text" name="name" placeholder="Name"></p>
				<p><input type="text" name="location" placeholder="Location"></p>
				<p><input type="submit" value="Create" class="btn btn-primary"></p>
			</form>
		</div>
	</div>
</body>
</html>