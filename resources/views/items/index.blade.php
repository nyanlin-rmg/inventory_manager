 @extends('layouts.default')
 @include('header')
<html>
<head>
	<style type="text/css">
		div {
    		padding-top:20px;
		}
	</style>
</head>
<body>
	<div class="container"> 
<<<<<<< HEAD
	<form action="{{ url('items/search') }}"  method="POST">
	{{ csrf_field() }}
	<input type="text" name="search" class="form-control" placeholder="search" required>
	<!-- <button type="submit" class="btn btn-primary">Search</button>   -->
	</form>
	<table class="table table-havor">
		<thread>
			<tr>
				<td> Name </td>
				<td>Quantity</td>
				<td>Action</td>		
				<td></td>				
=======
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
>>>>>>> 0dc7186a5a082f36e8891b275a135d0f33992727
			</tr>
		 </thread>
		 <tbody>
		 @foreach($items as $item)
		 <tr>

		 	<td>{{ $item->name }}</td>
<<<<<<< HEAD
		 	<td>{{ $warehouse->pivot->qty }}</td>
		
		 	<td> <a class="btn btn-success" href="{{ route('items.edit',$item->id) }}">Edit</a></td>
		 	<td>
			<form action="{{ route('items.destroy', $item->id) }}" method="post">
=======
		 	<td>{{ $item->price }}</td>
		 	<td> 
		 		<a class="btn btn-success" href="{{ route('items.edit',$item->id) }}">Edit</a>
				<form action="{{ route('items.destroy', $item->id) }}" method="post" style="display: inline;">
>>>>>>> 0dc7186a5a082f36e8891b275a135d0f33992727
					{{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
              </td>
		 </tr>
		@endforeach
		</tbody>
		</table>	
<<<<<<< HEAD
		<a href="{{ route('items.create') }}" class="btn btn-primary">Create</a>
=======
		<a href="{{ route('items.create') }}" class="btn btn-primary">Create Item</a>
>>>>>>> 0dc7186a5a082f36e8891b275a135d0f33992727
	</div>
</body>
</html>