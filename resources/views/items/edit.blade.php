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
				<?php $warehouses = $item->warehouses; ?>
				@foreach ($warehouses as $warehouse)
				<input type="hidden" name="warehouse_id" value="{{ $warehouse->pivot->warehouse_id }}"><br>
				@endforeach
				<input type="hidden" name="id" value="{{ $item->id }}"><br>
				<label>Name:</label>
				<input type="text" name="name" value="{{ $item->name }}" class="form form-control"><br>
				<?php 
					$warehouses = $item->warehouses;
				?>
				@foreach($warehouses as $warehouse) 
				<label>Quantity:</label>
				<input type="text" name="qty" value="{{ $warehouse->pivot->qty }}" class="form form-control"><br>
				@endforeach
				<input type="submit" value="Update" class="btn btn-primary">
			</form>
		</div>
	</div>
</body>
</html>