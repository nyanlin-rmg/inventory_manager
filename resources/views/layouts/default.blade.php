<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>
<!-- <link href="css/bootstrap.css" rel="stylesheet"> -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" type="text/css" href="{!! ('css/bootstrap-theme.min.css') !!}">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<link href="{!! ('css/style.css') !!} rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="row links">
				<ul class="list-inline text-left">
					<li><a href="{{ url('/') }}">Home</a></li>
				    <li><a href="{{ url('warehouses/') }}">Warehouse</a></li>
				    <li><a href="{{ url('categories/') }}">Category</a></li>
				    <li><a href="{{ url('items/') }}">Item</a></li>
					<li>
						
	                <a class="dropdown-item" href="{{ route('logout') }}"
	                   onclick="event.preventDefault();
	                                 document.getElementById('logout-form').submit();" >
	                    Logout
	                </a>

	                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	                    @csrf
	                </form>
	                                
	                </li>
				</ul>
		</div>
			@yield('content')	
	</div>
	<script src="{{url('js/app.js')}}"></script>
	<!-- <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
	@include('sweetalert::alert')
	@yield('script')
</body>
</html>