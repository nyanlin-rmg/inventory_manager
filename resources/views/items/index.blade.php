 @extends('layouts.default')
<html>
<head>
</head>
<body>
	<div class="container"> 
	<table class="table table-havor">
		<thread>
			<tr>
				<td> Name </td>
				<td>Quantity</td>
				<td>Action</td>						
			</tr>
		 </thread>
		 <tbody>
		 @foreach($items as $item)		 
		 <tr>
		 	<td><a href="{{ url('item/show',$item->id) }}">{{ $item->name }}</a></td>
		 	<td>{{ $item->pivot }}</td>
		 	<td> <a class="btn btn-success" href="{{ url('item/edit',$item->id) }}">Edit</a></td>

			<td> <a class="btn btn-danger" href="{{ url('item/destroy',$item->id)}}">Delete</a> </td>
		 </tr>
		@endforeach
		</tbody>
		</table>	
		<a href="{{ url('item/create') }}" class="btn btn-primary">Create</a>
	</div>
</body>
</html>