<?php
require_once('includes/header.php');
session_start();

if (isset($_SESSION["usuarioLogueado"])){
	foreach ($usuarios as $usuario) {
		$usuarioId = $usuario["id"];
		header("Location: index.php" . "?id=" . $usuarioId );
	}

}

$errores=array();

if (count($_POST))  {

	$email = null;
	$email = trim($_POST["email"]);
	$password = $_POST["password"];

	// Name
	if (empty($email)) {
		array_push($errores, "*The email field is empty.");
	}

	// Password
	if (empty($password)) {
		array_push($errores, "*The password field is empty.");
	}

	// Mostrar errores:
	if (!$errores){
		// $pathUsuarios = "db/usuario.json";
	  //   $arrayUsuarios= [];
		//
	  //   if(file_exists($pathUsuarios)){
	  //     $usuarioJson = file_get_contents($pathUsuarios);
		//
	  //     $arrayUsuarios = json_decode($usuarioJson,true);
	  //   }

	    //Guardar info en cookies
		if(isset($_POST['rememberme']) && $_POST['rememberme']){
			 setcookie("email", $email, time() + 365 * 24 * 60 * 60);
		}

		// $userFound = false;
	  //   foreach ($arrayUsuarios as $usuario) {
	  //     if ($_POST["name"] == $usuario["name"]){
	  //       if (password_verify($_POST["password"], $usuario["password"])){
	  //       	$userFound = true;
	  //         	$_SESSION["usuarioLogueado"] = $usuario;
	  //         	header("Location: index.php");
		//
	  //       }
	  //     }
	  //   }
		//
	  //   if (!$userFound){
	  //   	array_push ($errores, "*There was an error, please try again.");
	  //   }
		$userFound = false;
		foreach ($usuarios as $usuario) {
			if ($_POST["email"] == $usuario["email"]){
		    if (password_verify($_POST["password"], $usuario["password"])){
		       $userFound = true;
		       $_SESSION["usuarioLogueado"] = $usuario;
					 $usuarioId = $usuario["id"];
		       header("Location: index.php" . "?id=" . $usuarioId );
		     }
		  	}
			}

			if (!$userFound){
		   	array_push ($errores, "*There was an error, please try again.");
		   }
	  }
}

?>

	<main class="container main">

			<!-- START:MAIN-CONTENT-COLUMN -->
			<section class="col-12 col-sm-12 col-lg-12">

				<!-- START:ARTICLE -->
				<article class="bg p-5 rounded-border mb-5">
					<div class="row">
						<div class="col-10 offset-1 col-lg-6 offset-lg-3">
							<h1 class="mb-5 text-center"><strong>Login</strong></h1>

							<?php if (count($_POST) && ($errores)) : ?>
			                    <div class="alert alert-danger">
			                    	<h4><strong>Oops!</strong></h4>
			                        <?php foreach ($errores as $error): ?>
			                            <p><?php echo $error ?></p>
			                        <?php endforeach; ?>
			                    </div>
			                <?php endif; ?>

							<form class="form login-form" action="login.php" method="post">
								<input type="text" placeholder="Email Address" name="email" value="<?php if (isset($_COOKIE['email'])) {
											echo $_COOKIE['email'];
										} elseif (isset($email)){
											 echo $email;
										}
										?>">
								<input type="password" placeholder="Password" name="password" value="">
								<div class="form-check">
				                  <input type="checkbox" class="form-check-input" id="cbox1" name="rememberme" value="1">
				                  <label class="form-check-label" for="cbox1">Remember me</label>
				                </div>

								<button class=" contact-but btn btn-outline-info btn-block z-depth-0 my-4 waves-effect" name="submit" type="submit">LOGIN</button>

								<p class="message">Not registered? <a href="registro.php">Create an account</a></p>

							</form>

						</div>
					</div>
				</article><!-- END:ARTICLE -->
			</section><!-- END:MAIN-CONTENT-COLUMN -->
	</main>

	</body>
</html>
