@extends('layouts.app')
@section('content')
<div class="wrapper ">
	<div class="main-panel">
		<div class="container">
			<div class="content">
	          <div class="card">
	            <div class="card-header card-header-primary">
	              <h4 class="card-title ">History</h4>
	            </div>
	        	<div class="card-body">
	        		<form action="{{ url('histories/destroy_selected') }}">
		        		<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>Warehouse</th>
										<th>Item</th>
										<th>Quantity</th>
										<th>Action</th>
										<th>Date</th>
										<th></th>
									</tr>
								</thead>
								@foreach($histories as $history)
								<tr>
									<td><input type="checkbox" name="history[]" value="{{ $history->id }}">{{ ucwords($history->warehouse) }}</td>
									<td>{{ ucwords($history->item) }}</td>
									<td>{{ $history->qty }}</td>
									<td>{{ $history->action }}</td>
									<td>{{ $history->created_at }}</td>
									<td><a href="{{ url('histories/destroy', $history->id) }}" class="btn btn-danger">Clear</a></td>
								</tr>
							@endforeach
							</table>
						</div>
						<input type="submit" value="Clear" class="btn">
						<a href="{{ url('histories/destroy_all') }}" class="btn">Clear All</a>
					</form>
				</div>
			</div>
			</div>
		</div>
	</div>
</div>

@endsection