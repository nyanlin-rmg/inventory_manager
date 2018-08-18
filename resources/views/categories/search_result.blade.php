 @extends('layouts.app')
 @section('content')
 <div class="wrapper">
 	<div class="main-panel">
 		<div class="container">
 			<form action="{{ url('categories/search') }}" method="POST">
 			{{ csrf_field() }}
 				<input type="text" name="search" class="form-control search" placeholder="Search" value="{{ $search }}" required> 
 			</form>
 			<div class="container">
 				<div class="content">
 				<div class="card">
 				  <div class="card-header card-header-primary">
 				    <h4 class="card-title ">Category</h4>
 				  </div>
 				  <div class="card-body">
 				    <div class="table-responsive">
 				      <table class="table">
 				        <thread>
 					<tr>
 						<td>Name</td>
 						<td>Description</td>
 						<td width="250px"><b>Action</b></td>
 					</tr>

 				 	@forelse( $categories as $category)
 				 	<tr>
 						<td>{{ $category->name }}</td>
 						<td>{{ $category->description }}</td>
 						<td> <a class="btn btn-info" href="{{ route('categories.edit',$category->id) }}">Edit</a>
 						<button class="btn btn-warning" onclick="deleteCategory({{$category->id}})">Delete</button>
 						</td>
 				 	</tr>
 					@empty
 					<tr>
 						<td class="warning"> There is no item you are searching for!</td>
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
 	 	<a href="{{ route('categories.index') }}" class="btn btn-primary">Back</a>
 		</div>
 	</div>
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
            cancelButtonColor: "#d66",
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
    </div>
  </div>
</div>
@endsection