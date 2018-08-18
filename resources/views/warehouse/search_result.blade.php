@extends('layouts.app')
@section('content')
<div class="wrapper">
	<div class="main-panel">
		<div class="container">
			<form action="{{ url('warehouses/search') }}" method="POST">
				{{csrf_field()}}
				<input type="text" name="search" class="form-control search" placeholder="Search" value="{{ $search }}" required="">
			</form>
			<div class="container">
				<div class="content">
				<div class="card">
				  <div class="card-header card-header-primary">
				    <h4 class="card-title ">Warehouse</h4>
				  </div>
				  <div class="card-body">
				    <div class="table-responsive">
				      <table class="table">
				        <thread>
					<tr>
						<td><b>Name</b></td>
						<td><b>Address</b></td>
						<td><b>Phone Number</b></td>
						<td width="250px"><b>Action</b></td>
					</tr>
					@forelse($search_warehouses as $search_warehouse)
					<tr>
						<td><a href="{{ route('warehouses.show', $search_warehouse->id) }}">{{ ucwords($search_warehouse->name) }}</a></td>
						<td>{{ ucwords($search_warehouse->address) }}</td>
						<td>{{ ucwords($search_warehouse->phone) }}</td>
						<td><a href="{{ route('warehouses.edit', $search_warehouse->id) }}" class="btn btn-info">Edit</a>
							
								<button class="btn btn-warning" onclick="deleteWarehouse({{$search_warehouse->id}})">Delete</button>
							
						</td>
					</tr>
				@empty
				<tr>
					<td class="warning">There is no item you are searching for!</td>
					<td class="warning"></td>
					<td class="warning"></td>
					<td class="warning"></td>
				</tr>
				@endforelse
			</thread>
			</table>
			</div>
			</div>
			</div>
			</div>
	<a href="{{url('warehouses')}}" class="btn btn-primary">Back</a>
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