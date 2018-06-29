@extends('layouts.default')
<!DOCTYPE html>
<html>
<head>	
	<title></title>
</head>
<body>	
<<<<<<< HEAD
=======
	<div class="container">
>>>>>>> 0dc7186a5a082f36e8891b275a135d0f33992727
		<form action="{{route('items.store')}}" method="post">
			{{csrf_field()}}
				<div class="form-group">
					<label>Name:</label>
<<<<<<< HEAD
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
=======
					<input type="text" name="name" class="form-control">
				</div>

				<div class="form-group">
					<label>Price:</label>
					<input type="number" name="price" class="form-control">
				</div>

				
				<div class="form-group">
					<label>Category Name:</label>
						<div>
							<select name= "category_id" class="form-control">
								@foreach ($categories as $category)
									<option value="{{ $category->id }}">{{ $category->name }}</option>
								@endforeach
							</select>
						</div>
				</div>

				<div class="form-group"> 
>>>>>>> 0dc7186a5a082f36e8891b275a135d0f33992727
				<input type="submit" value="Create" class="btn btn-primary">
				<a href="{{ route('items.index') }}" class="btn btn-danger">Cancel</a>
				</div>	
		</form>
<<<<<<< HEAD
=======
	</div>
>>>>>>> 0dc7186a5a082f36e8891b275a135d0f33992727
</body>
</html>
