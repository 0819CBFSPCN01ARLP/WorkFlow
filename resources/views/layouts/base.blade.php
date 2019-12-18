<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<title>WorkFlow</title>
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="/css/style.css">
		<link rel="stylesheet" media="screen and (min-width:1024px)" href="/css/style-tablet.css">
		<link rel="stylesheet" media="screen and (min-width:1200px)" href="/css/style-desktop.css">
		<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script src="https://kit.fontawesome.com/47b7e03e46.js"></script>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

	</head>

	<body>

		@guest
			<header class="container-fluid mb-5 main-header">
				<div class="container">
					<div class="row">
						<div class="col-5 col-lg-3 py-3 hvr-grow">
							<a class="navbar-brand name-mob" href="{{ url('/') }}">W<strong>F</strong></a>
							<a class="navbar-brand name-desk" href="{{ url('/') }}">Work<strong>Flow</strong></a>
						</div>
					</div>
				</div>
			</header>
		@else
		<header class="container-fluid mb-5 main-header">
			<div class="container">
				<div class="row">

					<div class="col-6 col-lg-6 py-3">
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

					<div class="col-6 col-lg-6 py-3 head-options">
						<ul>
							<li class="search-mob"><a href="{{ url('/profile/') }}{{ Auth::user()->id }}" class="nav-item nav-link active"><i class="fas fa-user fa-2x"></i></a></li>
							<!--<li><a href=""><i class="fas fa-sign-in-alt fa-2x"></i></a></li>-->
							<li class="user-logo">
								<a href="{{ url('/profile') }}/{{ Auth::user()->id }}">
									@if($profileIndex)
										<img src="/storage/{{ $profileIndex->image }}" alt="">
									@endif
									<span>{{ Auth::user()->name }}</span>
								</a>
							</li>
						</ul>
					</div>
					<!-- navbar bottom -->
					{{-- <nav class="navbar navbar-bot nav justify-content-center fixed-bottom navbar-light bg-color">
		  				<ul>
		  					<li><a href="{{ url('/profile/') }}{{ Auth::user()->id }}" class="nav-item nav-link active"><i class="fas fa-user fa-2x"></i></a></li>
							<li class="mar"><a href="" class="nav-item nav-link active"><i class="fas fa-envelope fa-2x"></i></a></li>
						</ul>
					</nav> --}}
				</div>
			</div>
		</header>

		@endguest

		@yield('content')

<!--Modal Alert-->
		<div id="mymodal" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<p id="message">The field is empty, complete please.</p>
				</div>
			</div>
		</div>

<!--Back to top-->
		<div id="content"> &darr;</div>
		<a href="#" id="back-to-top" title="Back to top"><i class="fas fa-arrow-up"></i></a>

<!--Alert-->
		<script>
			var messageAlert = document.querySelector('.win-modal');
			var inputTextarea = document.querySelector('textarea');
			messageAlert.onsubmit = function(event){
				if (inputTextarea.value.trim()=="") {
					event.preventDefault();
					var message = document.querySelector('p#message');
					// message.innerHTML = "Mensaje sobre el error"
					$('#mymodal').modal();
				}
			}
		</script>

<!--Back to top-->
		<script type="text/javascript">
			if ($('#back-to-top').length) {
				var scrollTrigger = 100, // px
				backToTop = function () {
						var scrollTop = $(window).scrollTop();
						if (scrollTop > scrollTrigger) {
								$('#back-to-top').addClass('show');
						} else {
								$('#back-to-top').removeClass('show');
						}
				};
				backToTop();
				$(window).on('scroll', function () {
						backToTop();
				});
				$('#back-to-top').on('click', function (e) {
						e.preventDefault();
						$('html,body').animate({
								scrollTop: 0
						}, 700);
				});
			}
		</script>

</body>
</html>
