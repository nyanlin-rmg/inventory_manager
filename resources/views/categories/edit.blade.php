@extends('layouts.app')
@section('content')
<div class="wrapper">
	<div class="main-panel">
		<div class="container">
			<div class="content">
			<div class="card">
			  <div class="card-header card-header-primary">
			    <h4 class="card-title ">Category Edit</h4>
			  </div>
			  <div class="card-body">
			    <div class="table-responsive">
			      <table class="table">
			        <thread>
						<form action="{{ route('categories.update', $category->id) }}" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
						{{ method_field('PUT') }}
						<input type='hidden' name='id' class='form-control' value='{{ $category->id }}'>
						<tr>
							<div class="form-group">
								<label for="usr">Name:</label>
								<input type='text' name='name' class='form-control' value='{{ $category->name }}'>
							</div>
						</tr>
						<tr>
							<div class="form-group">
								<label for="usr">Description:</label>
								<textarea name="description" class="form-control">{{ $category->description }}</textarea>
							</div>
						</tr>
						<tr>
							<div class="input-group control-group increment">
								<img src="{{ asset('../images/' . $category->image )}}" width="80px" height="80px">
								<input type="file" name="image" value="{{ $category->image }}">
							</div>
						</tr>
						<tr>
							<div class="form-group">
								<input type="submit" class="btn btn-primary" value="Update"></input>
								<a href="{{ route('categories.index') }}" class="btn btn-danger">Cancel</a>
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