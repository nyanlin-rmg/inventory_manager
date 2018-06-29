<!DOCTYPE html>
<html>
<head>
	<title>Inventory Management</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/stylehome.css">
</head>
<body>
	<header class="header-bar">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand text-color" href="#">UCSY</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav menu-bar">
					<li class="nav-item">
						<a class="nav-link" href="home.html">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('warehouse.index')}}">WareHouse<span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="items.html">items</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="{{route('category.index')}}">Categories</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="home.html">About us</a>
					</li>
				</ul>				
			</div>			
		</nav>
		
	</header>