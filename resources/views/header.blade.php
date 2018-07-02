@extends('layouts.app')
<!DOCTYPE html>
<html>
<head>
	<title></title>
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
	</div>
</body>
</html>