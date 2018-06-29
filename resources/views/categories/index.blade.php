 @extends('layouts.default')
<html>
<head>
</head>
<body>
	<div class="container">
	<form action="{{ url('category/search') }}" method="POST">
	{{ csrf_field() }}
	<input type="text" name="search" class="form-control" placeholder="search" required> 
	</form>
	<hr/>
	@if ($message = Session::get('success'))
		<div class="alert alert-success">
		<p>{{ $message }}</p>
		</div>
	@endif

	<div class="container">
		<table class="table table-striped">
		<thread>

			<tr>
				<td><b> Name </b></td>
				<td><b> Description </b></td>
				<td> </td>
				<td> </td>
			</tr>
		 </thread>
		 <tbody>

		 @foreach ($categories as $category)
		 <tr>
			<td>{{ $category->name }}</td>
			<td>{{ $category->description }}</td>
			<td> <a class="btn btn-success" href="{{ route('category.edit',$category->id) }}">Edit</a></td>
			<td>
				<form action="{{ route('category.destroy', $category->id) }}" method="post">
					{{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
                </td>
		 </tr>
		@endforeach
		</tbody>
		</table>
		<a class="btn btn-primary" href="{{ route('category.create')}}">Create</a>
	</div>
</body>
</html>
