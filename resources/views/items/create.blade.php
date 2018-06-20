@extends('layouts.default')
<!DOCTYPE html>
<html>
<head>	
	<title></title>
</head>
<body>	
		<form action="{{url('item/store')}}" method="post">
			{{csrf_field()}}
			<br>
			<div class="container">
				<div class="form-group">
				<label>Name:</label>
				<input type="text" name="name" class="form form-control"></div><br>

				<div class="form-group">
				<label>Quantity:</label>
				<input type="text" name="qty" class="form form-control"></div><br>

				<div class="form-group">
				<label>Category_id:</label>
				<div>
				<select name= "category_id" class="form-control">
				@foreach ($categories as $category)
				<option value="{{ $category->id }}">{{ $category->name }}</option>
				@endforeach
				</select>
				</div><br>

				<div class="form-group">
				<label>Warehouse_id:</label>
				<div>
				<select name= "warehouse_id" class="form-control">
				
				@foreach ($warehouses as $warehouse)
				<option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
				@endforeach
				
				</select>
				</div><br>

				<input type="submit" value="Create" class="btn btn-primary">
			</div>	
		</form>
		
</body>
</html>