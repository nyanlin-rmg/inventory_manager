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
				    <h4 class="card-title ">Category Create</h4>
				  </div>
				  <div class="card-body">
				    <div class="table-responsive">
				      <table class="table">
				        <thread>
							<form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
								{{ csrf_field() }}
							<tr>
								<div class="form-group">
									<label>Name</label>
									<input type="text" name="name" class="form-control" null>
								</div>
							</tr>
							<tr>
								<div class="form-group">
									<label>Description</label>
									<textarea name="description" class="form-control"></textarea>
								</div>
							</tr>
							<tr>
								<div class="input-group control-group increment">
						            <input type="file" class="form-control form-group" name="image" aria-describedby="fileHelp">
						            <small class="form-text text-muted form-group">Please upload a valid image file.</small>
								</div>
							</tr>
							<tr>
								<div class="back form-group">
									<input type="submit" class="btn btn-primary" value="Submit"></button>
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
		</div>
	</div>
</div>
@endsection