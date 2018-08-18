<link rel="stylesheet" type="text/css" href="../css/style.css">
@extends('layouts.app')
@include('header')
@section('content')
	 <div class="wrapper ">   
    <div class="main-panel">
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">store</i>
                  </div>
                  <p class="card-category">Total Warehouses</p>
                  <h3 class="card-title">{{ $warehouses }}
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <p>Create More Warehouse...</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">content_paste</i>
                  </div>
                  <p class="card-category">Total Categories</p>
                  <h3 class="card-title">{{ $categories }}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <p>lorem ipsum</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">library_books</i>
                  </div>
                  <p class="card-category">Total Items</p>
                  <h3 class="card-title">{{ $items }}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <p>Lorem Ipsum</p>
                  </div>
                </div>
              </div>
            </div>
            </div>
          <div class="row">
            <div class="col-md-4">
              <img class="img-fluid" src="../img/w1.png" style="width: 250px; height: 200px">
              <h4 class="martin-top-20">Warehouse</h4>
              <p class="martin-top-20">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam
              </p>
            </div>
            <div class="col-md-4">
              <img class="img-fluid" src="../img/c1.jpeg" style="width: 250px; height: 200px">
              <h4 class="martin-top-20">Category</h4>
              <p class="martin-top-20">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam
              </p>
            </div>
            <div class="col-md-4">
              <img class="img-fluid" src="../img/item.jpeg" style="width: 250px; height: 200px">
              <h4 class="martin-top-20">Item</h4>
              <p class="martin-top-20">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="copyright text-center foot">
        &copy;2018 | UCSY
      </div>
    </div>
  </div>

@endsection