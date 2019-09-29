<?php

$name = null;
$errores=array();

// si vino info por POST
if (count($_POST)) {
	// Variables para persisitir la info:
	$name = $_POST["name"];
	$password = $_POST["password"];
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Poyecto integrador</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" media="screen and (min-width:1024px)" href="css/style-tablet.css">
		<link rel="stylesheet" media="screen and (min-width:1200px)" href="css/style-desktop.css">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<script src="https://kit.fontawesome.com/47b7e03e46.js"></script>
	</head>

	<body class="login">

		<header class="container-fluid mb-5 main-header">
		<div class="container">
			<div class="row">

				<div class="col-5 col-lg-3 py-3">
					<a class="navbar-brand" href="index.html">Work<strong>Flow</strong></a>
				</div>
			</div>
		</div>
	</header>

	<main class="container main">


			<!-- START:MAIN-CONTENT-COLUMN -->
			<section class="col-12 col-sm-12 col-lg-12">

				<!-- START:ARTICLE -->
				<article class="bg p-5 rounded-border mb-5">
					<div class="row">
						<div class="col-10 offset-1 col-lg-6 offset-lg-3">
							<h1 class="mb-5 text-center"><strong>Login</strong></h1>

							<form class="login-form" action="login.php" method="post">
								<input type="text" placeholder="username" name="name" value="<?php if(isset($name)) echo $name ?>">
								<input type="password" placeholder="password" name="password" value="<?php if(isset($password)) echo $password ?>">
								<input type="submit" name="submit" value="Login">
								<p class="message">Not registered? <a href="registro.php">Create an account</a></p>

								<?php require_once("validacion_login.php");  ?>

							</form>

						</div>
					</div>
				</article><!-- END:ARTICLE -->

			</section><!-- END:MAIN-CONTENT-COLUMN -->


	</main>

	</body>
</html>
