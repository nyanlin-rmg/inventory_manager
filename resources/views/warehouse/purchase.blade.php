@extends('layouts.app')
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<div class="container">
		<form action="{{url('warehouses/save')}}" method="post">
			{{ csrf_field() }}
		<div class="form-group">
			<label>Item Name:</label>
			<div>
					<select name= "item_id" class="form-control">
								@foreach ($items as $item)
									<option value="{{ $item->id }}">{{ $item->name }}</option>
								@endforeach
							</select>
						</div>
		</div>
		<div class="form-group">
			<label>Warehoues Name:</label>
			<div>
					<select name= "warehouse_id" class="form-control">
						@foreach ($warehouses as $warehouse)
							<option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
						@endforeach
					</select>
			</div>
		</div>
		<div class="form-group">
			<label>Quantity:</label>
			<input type="number" name="quantity" class="form-control" required="">
		</div>
		<input type="submit" value="Purchase" class="btn btn-primary">
		<a href="{{ route('warehouses.index') }}" class="btn btn-danger">Cancel</a>
	</form>
	</div>

</body>
</html>