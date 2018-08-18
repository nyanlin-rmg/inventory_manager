@extends('layouts.app')
@section('content')
<div class="wrapper">
	<div class="main-panel">
		<div class="container">
			@if ($errors->any())
				<div class="alert alert-danger">
					@foreach($errors->all() as $error)
						{{ $error }}
					@endforeach
				</div>
			@endif
			<div class="content">
				<div class="card">
			  		<div class="card-header card-header-primary">
			    		<h4 class="card-title ">Warehouse Create</h4>
			  		</div>
				  <div class="card-body">
				    <div class="table-responsive">
				      <table class="table">
				        <thread>			
							<form action="{{route('warehouses.store')}}" method="post" enctype="multipart/form-data">
								{{csrf_field()}}
								<tr>
									<div class="form-group">
										<label>Name:</label>
										<input type="text" name="name" class="form-control" required="">
									</div>
								</tr>
								<tr>
									<div class="form-group">
										<label>Address:</label>
										<textarea name="address" class="form-control" required=""></textarea>
									</div>
								</tr>
								<tr>
									<div class="form-group">
										<label>Phone:</label>
										<input type="number" name="phone" class="form-control" required="">
									</div>
								</tr>
								<tr>
									<div class="input-group control-group increment">
							            <input type="file" class="form-control form-group" name="image" aria-describedby="fileHelp" required="">
							            <small class="form-text text-muted form-group">Please upload a valid image file.</small>
									</div>
								</tr>
								<tr>
									<div class="back form-group">
										<input type="submit" value="Create" class="btn btn-primary">
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