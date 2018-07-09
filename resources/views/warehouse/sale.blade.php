@extends('layouts.app')
@section('content')
	<table class="table">
		@foreach($warehouses as $warehouse)
			<tr>
				<td><a href="{{ route('warehouses.sale_items', $warehouse->id) }}">{{ ucwords($warehouse->name) }}</a></td>
			</tr>
		@endforeach
	</table>
@endsection