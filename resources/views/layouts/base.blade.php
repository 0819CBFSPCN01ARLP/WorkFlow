<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<title>WorkFlow | @yield('title')</title>
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" media="screen and (min-width:1024px)" href="css/style-tablet.css">
		<link rel="stylesheet" media="screen and (min-width:1200px)" href="css/style-desktop.css">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<script src="https://kit.fontawesome.com/47b7e03e46.js"></script>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i&display=swap" rel="stylesheet">
	</head>

	<body>
		@guest
			<header class="container-fluid mb-5 main-header">
				<div class="container">
					<div class="row">
						<div class="col-5 col-lg-3 py-3">
							<a class="navbar-brand name-mob" href="{{ url('/') }}">W<strong>F</strong></a>
							<a class="navbar-brand name-desk" href="{{ url('/') }}">Work<strong>FLow</strong></a>
						</div>
					</div>
				</div>
			</header>
		@else
		<header class="container-fluid mb-5 main-header">
			<div class="container">
				<div class="row">

					<div class="col-5 col-lg-3 py-3">
						<div class="dropdown main-menu pr-3">
						  <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						    <i class="fas fa-bars fa-2x"></i>
						  </a>
						  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
						    <a class="dropdown-item" href="{{ url('/about-us') }}">About Us </a>
						    <a class="dropdown-item" href="{{ url('/faqs') }}">Faqs</a>
								<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
							 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									 @csrf
							 </form>
						  </div>
						</div>
						<a class="navbar-brand name-mob" href="{{ url('/') }}">W<strong>F</strong></a>
						<a class="navbar-brand name-desk" href="{{ url('/') }}">Work<strong>FLow</strong></a>
					</div>

					<form class="form-inline col-lg-5 py-3">
				        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
				  </form>

					<div class="col-7 col-lg-4 py-3 head-options">
						<ul>
							<li class="search-mob"><a href=""><i class="fas fa-search fa-2x"></i></a></li>
							<!--<li><a href=""><i class="fas fa-sign-in-alt fa-2x"></i></a></li>-->
							<li class="user-logo">
								<a href="{{ url('/profile') }}">
									<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSp3gZ8rLGb-NOO4VDjfiM-RBq0dkMFx2rX0-wnNje_L1Gq06qi" alt="">
									<span>{{ Auth::user()->name }}</span>
								</a>
							</li>
						</ul>
					</div>
					<!-- navbar bottom -->
					<nav class="navbar navbar-bot nav justify-content-center fixed-bottom navbar-light bg-color">
		  				<ul>
		  					<li><a href="{{ url('/profile') }}" class="nav-item nav-link active"><i class="fas fa-user fa-2x"></i></a></li>
								<li class="mar"><a href="" class="nav-item nav-link active"><i class="fas fa-envelope fa-2x"></i></a></li>
						</ul>
					</nav>
				</div>
			</div>
		</header>
		@endguest

		@yield('content')

</body>
</html>
