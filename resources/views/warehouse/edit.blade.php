@extends('layouts.app')
@section('content')
<div class="wrapper">
	<div class="main-panel">
		<div class="container">
			<div class="content">
			<div class="card">
			  <div class="card-header card-header-primary">
			    <h4 class="card-title ">Edit Warehouse</h4>
			  </div>
			  <div class="card-body">
			    <div class="table-responsive">
			      <table class="table">
			        <thread>
						<form action="{{ route('warehouses.update', $warehouse->id) }}" method="post" enctype="multipart/form-data">
							{{csrf_field()}}
							{{method_field('PUT')}}
							<input type="hidden" name="id" value="{{ $warehouse->id }}">
							<tr>
								<div class="form-group">
									<label for="usr">Name:</label>
									<input type="text" name="name" value="{{ $warehouse->name }}" class="form form-control">
								</div>
							</tr>
							<tr>
								<div class="form-group">
									<label for="usr">Address:</label>
									<textarea name="address" class="form form-control">{{ $warehouse->address }}</textarea>
								</div>
							</tr>
							<tr>
								<div class="form-group">
									<label for="phone">Phone:</label>
									<input type="text" name="phone" class="form form-control" value="{{ $warehouse->phone }}">
								</div>
							</tr>
							<tr>
								<div class="input-group control-group increment">
									<img src="{{ asset('../images/' . $warehouse->image )}}" width="80px" height="80px">
									<input type="file" name="image" value="{{ $warehouse->image }}">
								</div>
							</tr>
							<tr>
								<div class="form-group">
									<input type="submit" value="Update" class="btn btn-primary">
									<a href="{{ route('warehouses.index') }}" class="btn btn-danger">Cancel</a>
								</div>
							</tr>
						</form>
					</thread>
				</table>
			</div>
			</div>
			</div>
			</div>
		</div>
	</div>
</div>
@endsection