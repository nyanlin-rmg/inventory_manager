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
				    <li><a href="{{ url('warehouse/') }}">Warehouse</a></li>
				    <li><a href="{{ url('category/') }}">Category</a></li>
				    <li><a href="{{ url('item/') }}">Item</a></li>
					<li><a href="#">Login</a></li>
					<li><a href="#">Register</a></li>
			</ul>
		</div>
	</div>
</body>
</html>