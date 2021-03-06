@extends('layouts.app')
@section('content')
<div class="wrapper">
  <div class="main-panel">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <a href="{{ route('items.create') }}" class="btn btn-primary">Item Create</a>
        </div>
        <div class="col-md-9">
          <form action="{{ url('items/search') }}" method="POST">
                {{ csrf_field() }}
            <input type="text" name="search" class="form-control search" placeholder="Search" required> 
          </form>
        </div>
      </div>
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
                    <th> Name </th>
                    <th> Price </th>
                    <th>Category</th>
                    <th width="250px"> Action </th>
                  </tr>
                </thread>
                <tbody>
                 @foreach($items as $item)
                 <tr>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->price }}</td>
                  <td>{{ $item->category->name }}</td>
                  <td> 
                    <a class="btn btn-info" href="{{ route('items.edit',$item->id) }}">Edit</a>
                    <button class="btn btn-warning" onclick="deleteItem({{$item->id}})">Delete</button>
                  </td>
                 </tr>
                @endforeach
                </tbody>
              </table> 
            </div>
          </div>
        </div>
        {{ $items->links() }}
      </div>
      </div>
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