<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Inventory</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/sweetalert2.all.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

    <!-- CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{asset("../public/css/style.css")}}">
    <link href="{{asset('../css/material-dashboard.css?v=2.1.0')}}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{asset('../css/material-dashboard.min')}}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>  
  <div id="app">
    <div class="container">
      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
          <li><a class="nav-link links text-right" href="{{ route('login') }}">{{ __('Login') }}</a></li>
          <li><a class="nav-link links text-right" href="{{ route('register') }}">{{ __('Register') }}</a></li>
        @else
      </ul>
      <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
        <div class="logo simple-text logo-normal">
          <a href="#" class="simple-text logo-normal">
            Inventory Manager
          </a>
        </div>
        <div class="sidebar-wrapper">
          <ul class="nav">
            <li class="nav-item   ">
              <a class="nav-link" href="{{ url('/') }}">
                <i class="material-icons">dashboard</i>
                <p>Dashboard</p>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="{{ url('warehouses') }}">
                <i class="fas fa-warehouse"></i>
                <p>Warehouse</p>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="{{ url('categories') }}">
                <i class="material-icons">content_paste</i>
                <p>Category</p>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="{{ url('items') }}">
                <i class="material-icons">library_books</i>
                <p>Item</p>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="{{ url('warehouses/purchase') }}">
                <i class="fas fa-cart-plus"></i>
                <p>Purchase</p>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="{{ url('warehouses/sale') }}">
                <i class="fas fa-file-invoice-dollar"></i>
                <p>Sale</p>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="{{ url('warehouses/transfer') }}">
                <i class="fas fa-exchange-alt"></i>
                <p>Transfer</p>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="{{ url('warehouses/history') }}">
                <i class="fas fa-history"></i>
                <p>History</p>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="{{ url('about') }}">
                <i class="fas fa-info-circle"></i>
                <p>About Us</p>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i>
                <p>Logout</p>
              </a>
              <form id = "logout-form" action="{{ route('logout') }}" method="POST" style="display: none">@csrf</form>
            </li>
          </ul>
        </div>
        </div>
    @endguest
    </div>
  </div>
  <main class="py-4">
    @yield('content')
  </main>  
  @include('sweetalert::alert')
  @yield('script')
</body>
</html>