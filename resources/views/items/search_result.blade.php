@extends('layouts.app')
@section('content')
<div class="wrapper">
	<div class="main-panel">
		<div class="container">
			<form action="{{ url('items/search') }}" method="POST">
			{{csrf_field()}}
				<input type="text" name="search" class="form-control search" placeholder="Search" value="{{ $search }}" required="">
			</form>
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
						<td><b>Price</b></td>
						<td width="250px"><b>Action</b></td>
					</tr>
					@forelse($search_items as $search_item)
					<tr>
						<td>{{ ucwords($search_item->name) }}</td>
						<td>{{ ucwords($search_item->price) }}</td>
						<td><a href="{{ route('items.edit', $search_item->id) }}" class="btn btn-info">Edit</a>
						<button class="btn btn-warning" onclick="deleteItem({{$search_item->id}})">Delete</button>
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
			<a href="{{url('items')}}" class="btn btn-primary">Back</a>		
		</div>
	</div>
</div>
@endsection
    @section('script')
      <script type="text/javascript">
        function deleteItem(id) {
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
                    url: '/items/'+ id,
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