 @extends('layouts.app')
 @section('content')
		<form action="{{ url('categories/search') }}" method="POST">
		{{ csrf_field() }}
			<input type="text" name="search" class="form-control search" placeholder="search" value="{{ $search }}" required> 
		</form>
	</div>
	<div class="container">
		<table class="table table-striped">
			<tr>
				<td>Name</td>
				<td>Description</td>
				<td width="180px"><b>Action</b></td>
			</tr>
		 	@forelse( $categories as $category)
		 	<tr>
				<td>{{ $category->name }}</td>
				<td>{{ $category->description }}</td>
				<td> <a class="btn btn-success" href="{{ route('categories.edit',$category->id) }}">Edit</a>
					<form action="{{ route('categories.destroy', $category->id) }}" method="post" style="display: inline;">
						{{ csrf_field() }}
	                    {{ method_field('DELETE') }}
	                    <button class="btn btn-danger" type="submit">Delete</button>
	                </form>
				</td>
		 	</tr>
			@empty
			<tr>
				<td class="warning"> There is no category !!!! </td>
				<td class="warning"></td>
				<td class="warning"></td>
			</tr>
    	@endforelse
	</table>
    	<a href="{{ route('categories.index') }}" class="btn btn-primary">Back</a>  
@endsection