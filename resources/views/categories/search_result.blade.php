 @extends('layouts.default')
<html>
<head>
</head>
<body>
	<div class="container">
		@foreach($category as $category)
    	<h1>Show</h1>
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
		 	<tr>
		 	<td> {{ $category->id }} </td>
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
    	<a href="{{ route('category.index') }}" class="btn btn-primary">Back to home</a>  
</body>
</html>