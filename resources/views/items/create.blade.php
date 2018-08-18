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
			    		<h4 class="card-title ">Item Create</h4>
			  		</div>
				  <div class="card-body">
				    <div class="table-responsive">
				      <table class="table">
				        <thread>
							<form action="{{route('items.store')}}" method="post">
								{{csrf_field()}}
								<tr>
								<div class="form-group">
									<label>Name:</label>
									<input type="text" name="name" class="form-control" required="">
								</div>
							</tr>
							<tr>
								<div class="form-group">
									<label>Price:</label>
									<input type="number" name="price" class="form-control" required="">
								</div>
							</tr>
							<tr>
								<div class="form-group">
									<label>Category Name:</label>
										<div>
											<select name= "category_id" class="form-control" required>
												<option disabled="">Choose your category</option>
												@foreach ($categories as $category)
													<option value="{{ $category->id }}">{{ $category->name }}</option>
												@endforeach
											</select>
										</div>
								</div>
							</tr>
							<tr>
								<div class="form-group"> 
								<input type="submit" value="Create" class="btn btn-primary">
								<a href="{{ route('items.index') }}" class="btn btn-danger">Cancel</a>
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
</div>
@endsection
