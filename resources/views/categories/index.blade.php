@extends('layouts.app')
@section('content')
		<form action="{{ url('categories/search') }}" method="POST">
		{{ csrf_field() }}
			<input type="text" name="search" class="form-control search" placeholder="search" required> 
		</form>
	<div class="container">
		<table class="table table-striped">
		<thread>
			<tr>
				<th> Name </th>
				<th> Description </th>
				<th width="180px">Action</th>
			</tr>
		 </thread>
		 <tbody>
		 @foreach ($categories as $category)
		 <tr>
			<td>{{ $category->name }}</td>
			<td>{{ $category->description }}</td>
			<td> 
				<a class="btn btn-success" href="{{ route('categories.edit',$category->id) }}">Edit</a>
				<button class="btn btn-danger" onclick="deleteCategory({{$category->id}})">Delete</button>
				<!-- <form action="{{ route('categories.destroy', $category->id) }}" method="post" style="display: inline;">
					{{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form> -->
            </td>
		 </tr>
		@endforeach
		</tbody>
		</table>
		{{ $categories->links() }}
		<p><a class="btn btn-primary" href="{{ route('categories.create')}}">Create Category</a></p>
	</div>
@endsection
@section('script')
	<script type="text/javascript">
		function deleteCategory(id) {
		swal({
          title: "Are you sure?",
          text: "You cannot recover!",
          type: "warning",
          showCancelButton: true,
          cancelButtonColor: "black",
          cancelButtonText: "Cancel",
          confirmButtonColor: "#3085d6",
          confirmButtonText: "Delete"
        }).then((result) => {
            if (result.value) {
                $.ajax({
                url: '/categories/'+ id,
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
