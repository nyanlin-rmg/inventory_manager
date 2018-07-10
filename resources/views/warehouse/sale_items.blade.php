@extends('layouts.app')
@section('content')
<form action="{{ url('warehouses/sell_item') }}" method="post">
	{{ csrf_field() }}
	<input type="text" name="warehouse_id" value="{{ $warehouse->id }}" hidden>
	<div class="form-group">
		<label>Name:</label>
		<select name= "item_id" class="form-control">
			@foreach ($items as $item)
				<option value="{{ $item->id }}">{{ $item->name }}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<label>Quantity:</label>
		<input type="number" name="quantity" class="form-control" required>
	</div>
	<input type="submit" value="Sale Item" class="btn btn-primary">
	<a href="{{ url('warehouses/sale')}}" class="btn btn-danger">Cancel</a>
</form>
@endsection