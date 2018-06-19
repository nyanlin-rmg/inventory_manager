 @extends('layouts.default')
<html>
<head>
</head>
<body>
	<div class="container">
	<h1>Show</h1>
	<form action="{{ url('category/search') }}" method="POST">
	{{ csrf_field() }}
	<input type="text" name="search" required>
	<button type="submit" class="btn btn-primary">Search</button>  
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
				<td> ID </td>
				<td> Name </td>
				<td> Description </td>
				<td> </td>
	            <td> </td>
			</tr>
		 </thread>
		 <tbody>
		 <?php 
		 foreach ($categories as $category) {
		 	$id = $category->id;
		 ?>
		 <tr>
		 	<td> {{ $category->id }} </td>
			<td>{{ $category->name }}</td>
			<td>{{ $category->description }}</td>
			<td> <a class="btn btn-success" href="{{ route('category.edit',$category->id) }}">Edit</a></td>
			<td><!--  <a class="btn btn-danger" href="{{ route('category.destroy',$category->id)}}">Delete</a> --> 
				<form action="{{ route('category.destroy', $category->id) }}" method="post">
					{{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
			</td>
		 </tr>
		<?php } ?>
		</tbody>
		</table>
		<a class="btn btn-primary" href="{{ url('category/create')}}">Create</a><br><br>		
	</div>
</body>
</html>