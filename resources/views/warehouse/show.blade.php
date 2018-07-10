@extends('layouts.app')
@section('content')
	<div class="row">
	@foreach( $categories as $category )
		@foreach( $category as $name )
			<div class="col-sm-3">
			<div class="card" style="width: 18em;">
			  <div class="card-body">
			    <h5 class="card-title">
			    	<a href="{{ url('warehouses/showItems'.'/'. $name->id . '/' . $wid) }}">
					<input type="hidden" name="categoryid" value="{{ $name->id }}" >
					{{ $name->name }}
					</a>
				</h5>
			    <p class="card-text">{{ $name->description }}</p>
			  </div>
			</div>
		</div>
		@endforeach
	@endforeach
	</div>
	<div class="form-group">
	<a href="{{ url('warehouses') }}" class="btn btn-primary">Back</a>
	</div>	
@endsection