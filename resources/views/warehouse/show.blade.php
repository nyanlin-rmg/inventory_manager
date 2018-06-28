@extends('layouts.default')
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="container">
		<div class="form-group">
			<a href="{{ route('category.create') }}" class="btn btn-primary">Create Category</a>
		</div>
		<table class="table table-striped">
			<tr>
				<td><b>Category Name</b></td>
			</tr>
			@foreach( $categories as $category )
				@foreach( $category as $name )
			<tr>
				<td><a href="{{ url('warehouse/showItems'.'/'. $name->id . '/' . $wid) }}">
					<!-- <input type="hidden" name="categoryid" value="{{ $name->id }}" > -->
					{{ $name->name }}
				</a></td>
			</tr>
				@endforeach
			@endforeach	
		</table>
		<hr>
	</div>
</body>
</html>
