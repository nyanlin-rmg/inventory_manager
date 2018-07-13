@extends('layouts.app')
@section('content')
<div class="container">
	<form action="{{ url('items/search') }}" method="POST">
	{{ csrf_field() }}
	<input type="text" name="search" class="form-control search" placeholder="search" required> 
	</form>
	<table class="table table-havor">
		<thread>
			<tr>
				<th> Name </th>
				<th> Price </th>
				<th width="180px"> Action </th>
			</tr>
		 </thread>
		 <tbody>
		 @foreach($items as $item)
		 <tr>
		 	<td>{{ $item->name }}</td>
		 	<td>{{ $item->price }}</td>
		 	<td> 
		 		<a class="btn btn-success" href="{{ route('items.edit',$item->id) }}">Edit</a>
				<button class="btn btn-danger" onclick="deleteItem({{$item->id}})">Delete</button>
              </td>

		 </tr>
		@endforeach
		</tbody>
		</table>	
		{{ $items->links() }}
		<p><a href="{{ route('items.create') }}" class="btn btn-primary">Create Item</a></p>
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
</div>
@endsection