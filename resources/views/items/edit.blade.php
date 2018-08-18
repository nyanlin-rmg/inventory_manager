@extends('layouts.app')
@section('content')
<div class="wrapper">
	<div class="main-panel">
		<div class="container">
			<div class="content">
			<div class="card">
			  <div class="card-header card-header-primary">
			    <h4 class="card-title ">Item Edit</h4>
			  </div>
			  <div class="card-body">
			    <div class="table-responsive">
			      <table class="table">
			        <thread>
						<form action="{{ route('items.update', $item->id) }}" method="post">
							{{csrf_field()}}
							{{ method_field('PUT') }}
							<input type="hidden" name="id" value="{{ $item->id }}" required="">
							<tr>
								<div class="form-group">
									<label>Name:</label>
									<input type="text" name="name" value="{{ $item->name }}" class="form-control" required="">
								</div>
							</tr>
							<tr>
								<div class="form-group">
									<label>Price:</label>
									<input type="text" name="price" value="{{ $item->price }}" class="form-control">
								</div>
							</tr>
							<tr>
								<div class="form-group">
									<label>Category Name:</label>
										<div>
											<select name= "category_id" class="form-control" required>
												<option disabled="">Choose your category</option>
												@foreach ($categories as $category)
													<option @if($category->id == $selected_category->id) selected="selected" @endif 
													value="{{ $category->id }}">{{ $category->name }}</option>
												@endforeach
											</select>
										</div>
								</div>
							</tr>
							<tr>
								<div class="form-group">
									<input type="submit" value="Update" class="btn btn-primary">
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
@endsection
