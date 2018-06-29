
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
				<td><b>Name </b></td>
				<td> <b>Quanity</b> </td>
				<td><b>Action</b></td>	
				<td></td>			
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
			<td> <a class="btn btn-success" href="{{ route('item.edit',$item->id) }}">Edit</a></td>
			<td>
				<form action="{{ route('item.destroy', $item->id) }}" method="post">
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
    	<a href="{{ route('item.index') }}" class="btn btn-info">Back to home</a>

</body>
</html>