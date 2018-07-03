 <!DOCTYPE html>
<html>
<head>
</head>
<body>
	@include('layouts.app')
	<div class="container">
		<form action="{{ url('categories/search') }}" method="POST">
		{{ csrf_field() }}
			<input type="text" name="search" class="form-control search" placeholder="search" required> 
		</form>
	@if ($message = Session::get('success'))
		<div class="alert alert-success">
		<p>{{ $message }}</p>
		</div>
	@endif
	<div class="container">
		<table class="table table-havor">
		<thread>

			<tr>
				<th> Name </th>
				<th> Description </th>
				<th width="180px">Action</th>
			</tr>
		 </thread>
		 <tbody>

		 @foreach ($categories as $category)
		 <tr>
			<td>{{ $category->name }}</td>
			<td>{{ $category->description }}</td>
			<td> 
				<a class="btn btn-success" href="{{ route('categories.edit',$category->id) }}">Edit</a>
				<form action="{{ route('categories.destroy', $category->id) }}" method="post" style="display: inline;">
					{{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
		 </tr>
		@endforeach
		</tbody>
		</table>
		<a class="btn btn-primary" href="{{ route('categories.create')}}">Create Category</a>
	</div>
</body>
</html>
