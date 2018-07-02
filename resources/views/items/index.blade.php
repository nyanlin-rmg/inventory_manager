 <!DOCTYPE html>
 <html>
<head>
</head>
<body>
 @include('layouts.app')
	<div class="container"> 
	<form action="{{ url('items/search') }}" method="POST">
	{{ csrf_field() }}
	<input type="text" name="search" class="form-control search" placeholder="search" required> 
	</form>
	@if ($message = Session::get('success'))
		<div class="alert alert-success">
		<p>{{ $message }}</p>
		</div>
	@endif
	<table class="table table-havor">
		<thread>
			<tr>
				<th> Name </th>
				<th> Price </th>
				<th width="180px"> Action </th>
			</tr>
		 </thread>
		 <tbody>
		 @foreach($items as $item)
		 <tr>
		 	<td>{{ $item->name }}</td>
		 	<td>{{ $item->price }}</td>
		 	<td> 
		 		<a class="btn btn-success" href="{{ route('items.edit',$item->id) }}">Edit</a>
				<form action="{{ route('items.destroy', $item->id) }}" method="post" style="display: inline;">
					{{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
              </td>

		 </tr>
		@endforeach
		</tbody>
		</table>	
		<a href="{{ route('items.create') }}" class="btn btn-primary">Create Item</a>
	</div>
</body>
</html>