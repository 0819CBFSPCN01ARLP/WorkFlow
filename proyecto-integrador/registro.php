<?php

$name = null;
$errores=array();

// si vino info por POST
if (count($_POST)) {
	// Variables para persisitir la info:
	$name = $_POST["name"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$password_verify = $_POST["password_verify"];

	$errores=array();
}

?>

<?php require_once('includes/header.php'); ?>

	<main class="container main">


			<!-- START:MAIN-CONTENT-COLUMN -->
			<section class="col-12 col-sm-12 col-lg-12">

				<!-- START:ARTICLE -->
				<article class="bg p-5 rounded-border mb-5">
					<div class="row">
						<div class="col-10 offset-1 col-lg-6 offset-lg-3">
							<h1 class="mb-5 text-center"><strong>Register</strong></h1>

							<form class="register-form" action="registro.php" method="post">
								<input type="text" placeholder="User name" name="name" value="<?php if(isset($name)) echo $name ?>">
								<input type="text" placeholder="email address" name="email" value="<?php if(isset($email)) echo $email ?>">
								<input type="password" placeholder="password" name="password" value="<?php if(isset($password)) echo $password ?>">
								<input type="password" placeholder="password verify" name="password_verify">

								<input type="submit" name="submit" value="Register">
								<p class="message">Already registered? <a href="login.php">Sign In</a></p>
								<?php require_once("validacion_registro.php");?>
							</form>

						</div>
					</div>
				</article><!-- END:ARTICLE -->

			</section><!-- END:MAIN-CONTENT-COLUMN -->


	</main>

	</body>
</html>
