@extends('layouts.default')
<html>
<head>
</head>
<body>
	<div class="container">
	<h1>Create</h1>
	<form action="{{ url('category/store') }}" method="post">
	{{ csrf_field() }}
	<div class="form-group">
		<label for="usr">Name:</label>
		<input type="text" name="name" class="form-control">
	</div>
	<div class="form-group">
		<label for="usr">Description:</label>
		<textarea name="description" class="form-control"></textarea>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Submit</button>
	</div>
	</form>
	</div>
</body>
</html>