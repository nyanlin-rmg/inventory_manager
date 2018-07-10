@extends('layouts.app')
@section('content')
	{{-- <table class="table table-striped">
		<tr>
			<td><b>Category Name</b></td>
		</tr>
		@foreach( $categories as $category )
			@foreach( $category as $name )
		<tr>
			<td><a href="{{ url('warehouses/showItems'.'/'. $name->id . '/' . $wid) }}">
				<input type="hidden" name="categoryid" value="{{ $name->id }}" >
				{{ $name->name }}
			</a></td>
		</tr>
			@endforeach
		@endforeach	
	</table> --}}
		<div class="row">
			@foreach( $categories as $category )
				@foreach( $category as $name )
					<div class="col-sm-3">
						<div class="card" style="width: 18em; ">
							<img class="card-img-top" src="../img/cate-img.png" alt="Card image cap">
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

