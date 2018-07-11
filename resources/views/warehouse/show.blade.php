@extends('layouts.app')
@section('content')
		<div class="row">
			@foreach( $categories as $category )
				@foreach( $category as $name )
					<div class="col-sm-3">
						<div class="card" style="width: 18em; ">
							<img class="card-img-top" src="../images/{{ $name->image }}" alt="Card image cap" width="200" height="300">
							<div class="card-body">
								<h5 class="card-title">
									<a href="{{ url('warehouses/showItems'.'/'. $name->id . '/' . $wid) }}">
										<input type="hidden" name="categoryid" value="{{ $name->id }}" >
										{{ $name->name }}
									</a>
								</h5>
								{{ $name->description }}
							</div>
						</div>
					</div>	
				@endforeach
			@endforeach
		</div>
		<div>
			<a href="{{ url('warehouses') }}" class="btn btn-primary back">Back</a>
		</div>
@endsection