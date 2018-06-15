@extends('layouts.default')
<html>
<head></head>
<body>
	<div class="container">
	<h1>Update</h1>
	<form action="{{ route('category.update', $category->id) }}" method="post">
	{{ csrf_field() }}
	{{ method_field('PUT') }}
	<input type='hidden' name='id' class='form-control' value='{{ $category->id }}'><br>
	<div class="form-group">
		<label for="usr">Name:</label>
		<input type='text' name='name' class='form-control' value='{{ $category->name }}'>
	</div>
	<div class="form-group">
		<label for="usr">Description:</label>
		<textarea name="description" class="form-control">{{ $category->description }}</textarea>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-success">Update</button>
	</div>
	</form>
	</div>
</body>
</html>