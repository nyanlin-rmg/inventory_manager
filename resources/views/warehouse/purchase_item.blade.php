@extends('layouts.app')
@section('content')
<div class="wrapper">
	<div class="main-panel">
		<div class="container">
			<div class="content">
			<div class="card">
			  <div class="card-header card-header-primary">
			    <h4 class="card-title ">Purchase</h4>
			  </div>
			  <div class="card-body">
			    <div class="table-responsive">
			      <table class="table">
			        <thread>
						<form action="{{ url('warehouses/save') }}" method="post">
							{{ csrf_field() }}
							<input type="text" name="warehouse_id" value="{{ $warehouse->id }}" hidden>
							<tr>
								<div class="form-group">
									<label>Name:</label>
									<select name= "item_id" class="form-control">
										<option disabled class="opt-text">Choose Item</option>
										@foreach ($items as $item)
											<option value="{{ $item->id }}">{{ $item->name }}</option>
										@endforeach
									</select>
								</div>
							</tr>
							<tr>
								<div class="form-group">
									<label>Quantity:</label>
									<input type="number" name="quantity" class="form-control" required>
								</div>
							</tr>
							<tr>
								<input type="submit" value="Purchase Item" class="btn btn-primary">
								<a href="{{ url('warehouses/purchase')}}" class="btn btn-danger">Cancel</a>
							</tr>
						</form>		
		</div>
	</div>
</div>
@endsection