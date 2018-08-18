@extends('layouts.app')
@section('content')
<div class="wrapper">
	<div class="main-panel" style="margin-top: 0px">
		<div class="content"  style="margin-top: 0px; padding-top: 0px">
		<div class="card">
		  <div class="card-header card-header-primary">
		    <h4 class="card-title ">Purchase</h4>
		  </div>
		  <div class="card-body">
		     <div class="container">
				<div class="row">
					@foreach($warehouses as $warehouse)
					<div class="col-sm-3 warehouses">	
						<div class="card" style="width: 15em; height: 20em; ">
							 <img class="card-img-top" src="../images/{{ $warehouse->image }}" alt="Card image cap" style="height: 13em;">
							<div class="card-body">
								<h5 class="card-title">
									<a href="{{ url('warehouses/purchase_item', $warehouse->id) }}">{{ ucwords($warehouse->name) }}</a>
								</h5>
								<p>{{ ucwords($warehouse->address) }}</p>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
		</div>
		</div>
		</div>	
	</div>
</div>
@endsection