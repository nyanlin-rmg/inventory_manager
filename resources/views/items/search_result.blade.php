 @extends('layouts.default')
<html>
<head>
</head>
<body>
	<div class="container">
		
    	<h1>Show</h1>
    	<div class="container">
		<table class="table table-striped">
		<thread>
			<tr>
				<td> Name </td>
				<td> Quanity </td>
				<td> Price </td>
				<td> </td>
	            <td> </td>
			</tr>
		 </thread>
		 <tbody>
		 	@forelse( $items as $item)
		 	<tr>
			<td>{{ $item->name }}</td>
			<?php  
            $warehouses = $item->warehouses;
            ?>
            @foreach ($warehouses as $warehouse) 
            <td>{{ $warehouse->pivot->qty }}</td>
            @endforeach
<<<<<<< HEAD
=======
            <td>{{ $item->price }}</td>
>>>>>>> 0dc7186a5a082f36e8891b275a135d0f33992727
			<td> <a class="btn btn-success" href="{{ route('items.edit',$item->id) }}">Edit</a></td>
			<td>
				<form action="{{ route('items.destroy', $item->id) }}" method="post">
					{{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
			</td>
		 </tr>
		@empty
		 <div class="container">
		 <h1>  There is no item !!!! </h1>
		 </div>
    	@endforelse
    </tbody>
</table>
<<<<<<< HEAD
    	<a class="btn btn-info" href="{{ route('items.index') }}">Back to home</a>
=======
    	<a href="{{ route('items.index') }}" class="btn btn-primary">Back</a>
>>>>>>> 0dc7186a5a082f36e8891b275a135d0f33992727
</body>
</html>