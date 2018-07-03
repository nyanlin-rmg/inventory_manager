@extends('layouts.default')
@section('content')
	<div class="container">
		<div class="row">
			<form action="{{ route('warehouses.update', $warehouse->id) }}" method="post">
				{{csrf_field()}}
				{{method_field('PUT')}}
				<input type="hidden" name="id" value="{{ $warehouse->id }}">
				<div class="form-group">
					<label for="usr">Name:</label>
					<input type="text" name="name" value="{{ $warehouse->name }}" class="form form-control">
				</div>
				<div class="form-group">
					<label for="usr">Location:</label>
					<textarea name="location" class="form form-control">{{ $warehouse->location }}</textarea>
				</div>
				<div class="form-group">
					<input type="submit" value="Update" class="btn btn-primary">
					<a href="{{ route('warehouses.index') }}" class="btn btn-danger">Cancel</a>
				</div>
			</form>
		</div>
@endsection