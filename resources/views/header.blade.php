@extends('layouts.default')
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="container">
		<div class="row links">
			<ul class="list-inline text-left">
				<li><a href="{{ url('/') }}">Home</a></li>
			    <li><a href="{{ url('warehouses/') }}">Warehouse</a></li>
			    <li><a href="{{ url('categories/') }}">Category</a></li>
			    <li><a href="{{ url('items/') }}">Item</a></li>
				<li><a href="#">Login</a></li>
				<li><a href="#">Register</a></li>
			</ul>
		</div>
	</div>
</body>
</html>