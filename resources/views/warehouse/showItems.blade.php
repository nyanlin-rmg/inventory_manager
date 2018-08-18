@extends('layouts.app')
@section('content')
<div class="wrapper">
	<div class="main-panel">
		<div class="container">
			<div class="content">
			<div class="card">
			  <div class="card-header card-header-primary">
			    <h4 class="card-title ">Item</h4>
			  </div>
			  <div class="card-body">
			    <div class="table-responsive">
			      <table class="table">
			        <thread>
				<tr>
					<td><b>Name</b></td>
					<td><b>Quantity</b></td>
					<td> </td>
				</tr>
				@foreach( $items as $item )
				<form action="{{ url('warehouses/', $item->id) }}" method="post">
					{{ csrf_field() }}
					<tr>
						<td>{{ ucwords($item->name) }}</td>
						<td>{{ $item->pivot->qty }}</td>					
					</tr>
					</form>
					@endforeach	
				</thread>
				</table>
				</div>
				</div>
				</div>
				</div>
				<a href="{{ route('warehouses.show', $warehouse_id) }}" class="btn btn-primary">Back</a>		
		</div>
	</div>	
</div>
@endsection