@extends('layouts.app')
@section('content')
<div class="container">
	<form action="{{ route('categories.update', $category->id) }}" method="post">
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
		<input type="submit" class="btn btn-primary" value="Update"></input>
		<a href="{{ route('categories.index') }}" class="btn btn-danger">Cancel</a>
	</div>
	</form>
</div>
@endsection