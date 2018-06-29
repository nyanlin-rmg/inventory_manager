 @extends('layouts.default')
<html>
<head>
	<title>Category Search</title>
</head>
<body>
	<div class="container">
		<table class="table table-striped">
			<tr>
				<td> ID </td>
				<td> Name </td>
				<td> Description </td>
				<td> </td>
	            <td> </td>
			</tr>
		 	@forelse( $categories as $category)
		 	<tr>
			 	<td> {{ $category->id }} </td>
				<td>{{ $category->name }}</td>
				<td>{{ $category->description }}</td>
				<td> <a class="btn btn-success" href="{{ route('categories.edit',$category->id) }}">Edit</a></td>
				<td>
					<form action="{{ route('categories.destroy', $category->id) }}" method="post">
						{{ csrf_field() }}
	                    {{ method_field('DELETE') }}
	                    <button class="btn btn-danger" type="submit">Delete</button>
	                </form>
				</td>
		 	</tr>
			@empty
			<tr>
				<td class="alert alert-warning"> There is no item !!!! </td>
				<td class="alert alert-warning"></td>
				<td class="alert alert-warning"></td>
			</tr>
    	@endforelse
	</table>
    	<a href="{{ route('categories.index') }}" class="btn btn-primary">Back</a>  
    </div>
</body>
</html>