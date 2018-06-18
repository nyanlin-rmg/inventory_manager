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
				<select name= "cid" class="form-control">
				@foreach ($categories as $category)
				<option value="{{ $category->id }}">{{ $category->name }}</option>
				@endforeach
				</select>
				</div><br>

				<div class="form-group">
				<label>Warehouse_id:</label>
				<div>
				<select name= "wid" class="form-control">
				
				<option value="1">warehouse1</option>
				<option value="2">warehouse2</option>
				<option value="3">warehouse3</option>
				
				</select>
				</div><br>

				<input type="submit" value="Submit" class="btn btn-primary">
			</div>	
		</form>
		
</body>
</html>