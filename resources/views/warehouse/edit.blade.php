@extends('layouts.design')
	<div class="container">
		<h2>Update Warehouse</h2>
		<div class="container text-dark mt-5">
			<div class="row">
				<div class="col-md-12">
					<form action="{{ route('warehouse.update', $warehouse->id) }}" method="post">
						{{ csrf_field() }}
						{{ method_field('PUT') }}
						<div class="form-group row">
						    <label for="Name" class="col-sm-2 col-form-label">Name</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="name" value="{{ $warehouse->name }}">
						    </div>
						</div>
						<div class="form-group row">
						  	<div class="col-sm-2">
						  		<label>Location</label>
						  	</div>
						  	<div class="col-sm-10">
						  		<textarea class="form-control" name="location">{{ $warehouse->location }}</textarea> 
						  	</div>
						</div>
					  	
					  	<div class="form-group row pull-right">
					    	<div class="col-sm-10">
					      		<button type="submit" class="btn btn-primary">Update</button>
					    	</div>
					  	</div>
					</form>
				</div>
			</div>
		</div>
	</div>