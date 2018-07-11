@extends('layouts.app')
@section('content')
	{{-- <table class="table">
		@foreach($warehouses as $warehouse)
		<tr>
			<td><a href="{{ url('warehouses/sale_items', $warehouse->id) }}">{{ ucwords($warehouse->name) }}</a></td>
			<td>{{ ucwords($warehouse->location) }}</td>
		</tr>
		@endforeach
	</table> --}}
		<div class="row">
			@foreach($warehouses as $warehouse)
			<div class="col-sm-3 warehouses">	
				<div class="card" style="width: 18em; height: 25em; ">
					 <img class="card-img-top" src="../images/{{ $warehouse->image }}" alt="Card image cap" style="height: 18em;">
					<div class="card-body">
						<h5 class="card-title">
							<a href="{{ url('warehouses/sale_items', $warehouse->id) }}">{{ ucwords($warehouse->name) }}</a>
						</h5>
						{{ ucwords($warehouse->location) }}
					</div>
				</div>
			</div>
			@endforeach
		</div>
		<div class="back">
			<a href="{{ url('warehouses')}}" class="btn btn-primary back">Back</a>
		</div>

@endsection