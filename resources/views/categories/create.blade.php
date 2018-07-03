@extends('layouts.default')
@section('content')
	@if ($errors->any())
	<div class="alert alert-danger">
		@foreach($errors->all() as $error)
		{{ $error }}
		@endforeach
	</div>
	@endif
	<form action="{{ route('categories.store') }}" method="POST">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="usr">Name:</label>
			<input type="text" name="name" class="form-control" placeholder="Name" null>
		</div>
		<div class="form-group">
			<label for="usr">Description:</label>
			<textarea name="description" class="form-control" placeholder="Description"></textarea>
		</div>
		<div class="form-group">
			<input type="submit" class="btn btn-primary" value="Submit"></button>
			<a href="{{ route('categories.index') }}" class="btn btn-danger">Cancel</a>
		</div>
	</form>

@endsection