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
<?php require_once('includes/header.php'); ?>

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
