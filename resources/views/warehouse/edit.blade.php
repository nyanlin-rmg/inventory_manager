@extends('layouts.default')
	<div class="container">
		<h2>Update Warehouse</h2>
		<div class="row">
			<form action="{{ route('warehouse.update', $warehouse->id) }}" method="post">
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
					<a href="{{ route('warehouse.index') }}" class="btn btn-primary">Cancel</a>
				</div>
			</form>
		</div>
	</div>