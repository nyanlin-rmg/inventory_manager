 @extends('layouts.default')
<html>
<head>
</head>
<body>
	<div class="container"> 
	<h1>Show</h1>
	<hr/>
	<a class="btn btn-primary" href="{{ url('category/create')}}">Create</a><br><br>
	@if ($message = Session::get('success'))
		<div class="alert alert-success">
		<p>{{ $message }}</p>
		</div>
	@endif
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
		 $categories = DB::table('categories')->get();
		 //$categories = Category::get();
		 foreach ($categories as $category) {
		 	$id = $category->id;
		 ?>
		 <tr>
		 	<td> {{ $category->id }} </td>
			<td>{{ $category->name }}</td>
			<td>{{ $category->description }}</td>
			<td> <a class="btn btn-success" href="{{ url('category/edit',$category->id)}}">Edit</a></td>
			<td> <a class="btn btn-danger" href="{{ url('category/delete',$category->id)}}">Delete</a> </td>
		 </tr>
		<?php } ?>
		</tbody>
		</table>	
	</div>
</body>
</html>