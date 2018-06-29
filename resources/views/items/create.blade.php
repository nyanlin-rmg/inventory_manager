@extends('layouts.default')
<!DOCTYPE html>
<html>
<head>	
	<title></title>
</head>
<body>	
		<form action="{{route('items.store')}}" method="post">
			{{csrf_field()}}
			<br>
			<div class="container">
				<div class="form-group">
					<label>Name:</label>
						<input type="text" name="name" class="form form-control">
				</div>
				<div class="form-group">
					<label>Quantity:</label>
					<input type="text" name="qty" class="form form-control">
				</div>
				<div class="form-group">
					<label>Category_id:</label>
					<select name= "category_id" class="form-control">
					@foreach ($categories as $category)
					<option value="{{ $category->id }}">{{ $category->name }}</option>
					@endforeach
					</select>
				</div>
				<input type="submit" value="Create" class="btn btn-primary">
			</div>	
		</form>
</body>
</html>