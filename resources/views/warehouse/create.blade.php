@extends('layouts.app')
@section('content')
		@if ($errors->any())
			<div class="alert alert-danger">
				@foreach($errors->all() as $error)
					{{ $error }}
				@endforeach
			</div>
		@endif
			<form action="{{route('warehouses.store')}}" method="post" enctype="multipart/form-data">
				{{csrf_field()}}
				<div class="form-group">
					<label>Name:</label>
					<input type="text" name="name" placeholder="Name" class="form-control" required="">
				</div>
				<div class="form-group">
					<label>Location:</label>
					<textarea placeholder="Location" name="location" class="form-control" required=""></textarea>
				</div>
				<div class="input-group control-group increment">
		            <input type="file" class="form-control" name="image" aria-describedby="fileHelp">
		            <small class="form-text text-muted">Please upload a valid image file.</small>
				</div>
				<div class="back">
					<input type="submit" value="Create" class="btn btn-primary">
					<a href="{{ route('warehouses.index') }}" class="btn btn-danger">Cancel</a>
				</div>
			</form>
@endsection