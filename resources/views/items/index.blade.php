 @extends('layouts.default')
<html>
<head>
</head>
<body>
	<div class="container">
		<form action="{{ url('item/search') }}" method="POST">
			{{csrf_field()}}
			<table class="table">
				<tr>
					<td>
						<input type="text" name="search" class="form-control" placeholder="Search" required="">
					</td>
					
				</tr>
			</table>
		</form>
	</div>
	<div class="container">
	<table class="table table-striped">
		<thread>
			<tr>
				<td><b>Name</b></td>
				<td><b>Quantity</b></td>
				<td><b>Action</b></td>	
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

		 	<td><a href="{{ route('item.show',$item->id) }}">{{ $item->name }}</a></td>
		 	<td>{{ $warehouse->pivot->qty }}</td>
		
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
		@endforeach
		</tbody>
		</table>	
		<a href="{{ route('item.create') }}" class="btn btn-primary">Create</a>
	</div>
</body>
</html>