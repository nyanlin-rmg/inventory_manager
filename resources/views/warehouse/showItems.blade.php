@extends('layouts.app')
@section('content')
	<table class="table table-striped">
		<tr>
			<td><b>Name</b></td>
			<td><b>Quantity</b></td>
			<td> </td>
		</tr>
		@foreach( $items as $item )
		<form action="{{ url('warehouses/inventory_in_out', $item->id) }}" method="post">
			{{ csrf_field() }}
			<tr>
				<td>{{ ucwords($item->name) }}</td>
				<td>{{ $item->pivot->qty }}</td>					
			</tr>
			</form>
			@endforeach	
		</table>
		<hr>
		<a href="{{ url('warehouses') }}" class="btn btn-primary">Back</a>
@endsection