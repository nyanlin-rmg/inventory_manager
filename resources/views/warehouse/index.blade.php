@extends('layouts.app')
@section('content')
<div class="wrapper ">
<div class="main-panel">
	<div class="container">
		<form action="{{ url('warehouses/search') }}" method="POST">
			{{csrf_field()}}
			<input type="text" name="search" class="form-control search" placeholder="Search" required>
		</form>
		 <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Warehouse</h4>
                  
                </div>
                <div class="card-body">
                  <div class="table-responsive">
		<table class="table">
			<thead class=" text-primary">
			<tr>
				<th> Name </th>
				<th> Location </th>
				<th width="250px"> Action </th>
			</tr>
			</thead>
			@foreach($warehouses as $warehouse)
			<tr>
				<td><a href="{{ route('warehouses.show', $warehouse->id) }}">{{ ucwords($warehouse->name) }}</a></td>
				<td>{{ ucwords($warehouse->location) }}</td>
				<td>
					<a href="{{ route('warehouses.edit', $warehouse->id) }}" class="btn btn-info">Edit</a>
					<button class="btn btn-warning" onclick="deleteWarehouse({{$warehouse->id}})">Delete</button>
				</td>
			</tr>
			@endforeach
		</table>
	</div>
</div>
</div>
</div>
</div>
</div></div>
		{{ $warehouses->links() }}
		<hr>
		<a href="{{ route('warehouses.create') }}" class="btn btn-primary">Create Warehouse</a>
		<a href="{{ url('warehouses/purchase') }}" class="btn btn-primary">Purchase</a>
		<a href="{{ url('warehouses/sale') }}" class="btn btn-primary">Sale</a>
	</div>
</div>
</div>
</div>

@endsection
	@section('script')
		<script type="text/javascript">
			function deleteWarehouse(id) {
			swal({
	          title: "Are you sure?",
	          text: "You cannot recover!",
	          type: "warning",
	          showCancelButton: true,
	          cancelButtonColor: "#d66",
	          cancelButtonText: "Cancel",
	          confirmButtonColor: "#3085d6",
	          confirmButtonText: "Delete"
	        }).then((result) => {
	            if (result.value) {
	                $.ajax({
	                url: '/warehouses/'+ id,
	                type:"POST",
	                data: {'id':id,'_token': "{{ csrf_token() }}",'_method' : "DELETE"},
	                success: function(response){
	                swal({
	                    title: 'Success',
	                    text: 'deleted',
	                    type: 'success',
	                    confirmButtonColor: "teal",
	                }).then((result) => {
	                    if(result.value) {
	                        location.reload();
	                    }
	                })
	            },
	                error:function (response){
	                    swal({
	                      title: response.status + '!',
	                      text: response.statusText ,
	                      type: "error",
	                      confirmButtonColor: "teal"
	                    });
	                    console.log(response);
	                  }
	                })
	            }    
	        })
	    }
		</script>
	@endsection
