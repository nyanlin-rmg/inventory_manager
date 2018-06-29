@extends('layouts.default')
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="{{ url('/save') }}" method="post">
		{{ csrf_field() }}
		<div class="container">
			<table class="table table-striped">
				<tr>
					<td>Item:</td>
					<td>
						<select name="item" class="form-control">
						@foreach ($items as $item)
						<option value="{{ $item->id }}">{{ $item->name }}</option>	
						@endforeach
						</select>
					</td>
				</tr>
				<tr>
					<td>Quantity:</td>
					<td><input type="text" name="quantity" class="form-control"></td>
				</tr>
				<tr>
					<td>Warehouse:</td>
					<td>
						<select name="warehouse" class="form-control">
						@foreach ($warehouses as $warehouse)
						<option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>	
						@endforeach
						</select>
					</td>
				</tr>
			</table>
			<input type="submit" value="Submit" class="btn btn-info">
		</div>
	</form>
</body>
</html>