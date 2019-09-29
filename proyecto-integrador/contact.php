<?php

$name = null;
$errores=array();
// si vino info por POST
if (count($_POST)) {
	// Variables para persisitir la info:
	$name = $_POST["name"];
	$email = $_POST["email"];
	$message = $_POST["message"];
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>WorkFlow| Contact Us</title>
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

	<header class="container-fluid mb-5 main-header">
		<div class="container">
			<div class="row">

				<div class="col-5 col-lg-3 py-3">
					<div class="dropdown main-menu pr-3">
					  <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					    <i class="fas fa-bars fa-2x"></i>
					  </a>
					  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
					    <a class="dropdown-item" href="about.php">About Us</a>
					    <a class="dropdown-item" href="faqs.php">Faqs</a>
							<a class="dropdown-item" href="contact.php">Contact Us</a>
							<a class="dropdown-item" href="login.php">Login/Logout</a>
					  </div>
				</div>
					<a class="navbar-brand name-mob" href="index.php">W<strong>F</strong></a>
					<a class="navbar-brand name-desk" href="index.php">Work<strong>FLow</strong></a>
				</div>

				<form class="form-inline col-lg-5 py-3">
	        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
	      </form>

				<div class="col-7 col-lg-4 py-3 head-options">
					<ul>
						<li class="search-mob"><a href=""><i class="fas fa-search fa-2x"></i></a></li>
						<li><a href=""><i class="fas fa-bell fa-2x"></i></a></li>
						<li class="inbox-desk"><a href=""><i class="fas fa-envelope fa-2x"></i></a></li>
						<!--<li><a href=""><i class="fas fa-sign-in-alt fa-2x"></i></a></li>-->
						<li class="user-logo">
							<a href="profile.html">
								<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSp3gZ8rLGb-NOO4VDjfiM-RBq0dkMFx2rX0-wnNje_L1Gq06qi" alt="">
								<span>Ross Geller</span>
							</a>
						</li>
					</ul>
				</div>

<!-- navbar bottom -->
			<nav class="navbar navbar-bot nav justify-content-center fixed-bottom navbar-light bg-color">
  				<ul>
  					<li><a href="profile.html" class="nav-item nav-link active"><i class="fas fa-user fa-2x fa-col"></i></a></li>
						<li class="mar"><a href="" class="nav-item nav-link active"><i class="fas fa-envelope fa-2x"></i></a></li>
					</ul>
			</nav>

			</div>
		</div>
	</header>

	<!-- form -->

<main class="container main">

	<!-- START:MAIN-CONTENT-COLUMN -->


<!-- START:ARTICLE -->
<article class="bg p-4 rounded-border mb-5 ">

	<!-- Material form contact -->
<div class="card col col-sm-12 col-lg-6 offset-lg-3 ">

    <h1 class="info-color white-text text-center py-4 mb-4">
        <strong>Contact us</strong>
    </h5>

    <!--Card content-->
    <div class="card-body px-lg-5 pt-0">

        <!-- Form -->
        <form class="text-center" style="color: #757575;" action="contact.php" method="post">

				<div class="contact-form">
					<!-- Name -->
            <div class="md-form mt-3">
                <input type="text" placeholder="Name" name="name" class="form-control" value="<?php if(isset($name)) echo $name?>">
                <label for="materialContactFormName"></label>
            </div>

            <!-- E-mail -->
            <div class="md-form">
                <input type="email" placeholder="Email" name="email" class="form-control" value="<?php if(isset($email)) echo $email?>">
                <label for="materialContactFormEmail"></label>
            </div>

            <!--Message-->
            <div class="md-form">
                <textarea id="materialContactFormMessage" name="message" placeholder="Message" class="form-control md-textarea" rows="3" value="<?php if(isset($message)) echo $message?>"></textarea>
                <label for="materialContactFormMessage"></label>
            </div>

          	<!-- Send button -->

            <button class=" contact-but btn btn-outline-info btn-block z-depth-0 my-4 waves-effect" name="submit" type="submit">SEND</button>

						<?php require_once("validacion_contactUs.php"); ?>

					</div>
        </form>
        <!-- Form -->

    </div>

</div>
<!-- Material form contact -->

		</article>

</main>
	</body>
</html>
