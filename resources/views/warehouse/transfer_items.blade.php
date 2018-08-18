@extends('layouts.app')
@section('content')
<div class="wrapper">
	<div class="main-panel">
		<div class="container">
			<div class="content">
			<div class="card">
			  <div class="card-header card-header-primary">
			    <h4 class="card-title ">Transfer</h4>
			  </div>
			  <div class="card-body">
			    <div class="table-responsive">
			      <table class="table">
			        <thread>
						<form action="{{ url('warehouses/transfer_save') }}" method="post">
							{{ csrf_field() }}
							<input type="text" name="warehouse_id" value="{{ $warehouse_id }}" hidden>
							<tr>
								<div class="form-group">
									<label>Warehouse:</label>
									<select name= "warehouse" class="form-control">
										<option disabled class="opt-text">Choose Warehouse</option>
										@foreach ($warehouses as $transfer_warehouse)
										<option class="opt-text" value="{{$transfer_warehouse->id}}">{{$transfer_warehouse->name}}</option>
										@endforeach
									</select>
								</div>
							</tr>
							<tr>
								<div class="form-group">
									<label>Item:</label>
									<select name= "item" class="form-control">
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
								<input type="submit" value="Transfer Item" class="btn btn-primary">
								<a href="{{ url('warehouses/transfer')}}" class="btn btn-danger">Cancel</a>
							</tr>
						</form>	
						</thread>
					</table>
				</div>
				</div>
				</div>
				</div>	
		</div>
	</div>
</div>
@endsection