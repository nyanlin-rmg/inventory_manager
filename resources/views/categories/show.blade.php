@extends('layouts.default')
@section('content')
<div class="wrapper">
	<div class="main-panel">
		<div class="container">
			<table class="table table-striped">
				<tr>
					<td><b>Name</b></td>
					<td><b>Qty</b></td>
				</tr>
				@foreach ($items as $item)
				<tr>
					<td>
						
						{{ $item->name }}
						
					</td>
				</tr>
				@endforeach
			</table>
		</div>	
	</div>
</div>
@endsection