 @extends('layouts.default')
<html>
<head>
</head>
<body>
	<div class="container"> 
	<form action="{{ url('item/search') }}" method="POST">
	{{ csrf_field() }}
	<input type="text" name="search" class="form-control" placeholder="search" required> 
	</form>
	<hr/>
	@if ($message = Session::get('success'))
		<div class="alert alert-success">
		<p>{{ $message }}</p>
		</div>
	@endif
	<table class="table table-havor">
		<thread>
			<tr>
				<td><b> Name </b></td>
				<td><b> Price </b></td>
				<td> </td>						
				<td> </td>
			</tr>
		 </thread>
		 <tbody>
		 @foreach($items as $item)
		 <tr>
		 	<td>{{ $item->name }}</td>
		 	<td>{{ $item->price }}</td>
		 	<td> <a class="btn btn-success" href="{{ route('item.edit',$item->id) }}">Edit</a></td>
		 	<td>
			<form action="{{ route('item.destroy', $item->id) }}" method="post">
					{{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
		 </tr>
		@endforeach
		</tbody>
		</table>	
		<a href="{{ route('item.create') }}" class="btn btn-primary">Create</a>
	</div>
</body>
</html>