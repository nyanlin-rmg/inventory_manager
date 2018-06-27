 @extends('layouts.default')
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
			</tr>
		 </thread>
		 <tbody>
		 @foreach($items as $item)
		<?php 
			$warehouses = $item->warehouses;
		?>
		@foreach($warehouses as $warehouse) 
		 <tr>

		 	<td>{{ $item->name }}</td>
		 	<td>{{ $warehouse->pivot->qty }}</td>
		
		 	<td> <a class="btn btn-success" href="{{ route('items.edit',$item->id) }}">Edit</a></td>
		 	<td>
			<form action="{{ route('items.destroy', $item->id) }}" method="post">
					{{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
               </td>
		 </tr>
		@endforeach	
		@endforeach
		</tbody>
		</table>	
		<a href="{{ route('items.create') }}" class="btn btn-primary">Create</a>
	</div>
</body>
</html>