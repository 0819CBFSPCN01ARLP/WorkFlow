<?php

session_start();

if (isset($_SESSION["usuarioLogueado"])){
	header("Location: index.php");
}

$errores=array();
$name = null;

if (count($_POST))  {
	
	$name = trim($_POST["name"]);
	$password = $_POST["password"];

	// Name
	if (empty($name)) {
		array_push($errores, "*The username field is empty.");
	}

	// Password
	if (empty($password)) {
		array_push($errores, "*The password field is empty.");
	}

	//Guardar info en cookies
	if ( $_POST["rememberme"] == "1"){
		setcookie("name", $name, time() + 365 * 24 * 60 * 60);
		setcookie("password", $password, time() + 365 * 24 * 60 * 60);
	}

	// Mostrar errores:
	if (!$errores){
		$pathUsuarios = "db/usuario.json";
	    $arrayUsuarios= [];

	    if(file_exists($pathUsuarios)){
	      $usuarioJson = file_get_contents($pathUsuarios);

	      $arrayUsuarios = json_decode($usuarioJson,true);
	    }

	    foreach ($arrayUsuarios as $usuario) {
	      if ($_POST["name"] == $usuario["name"]){
	        if (password_verify($_POST["password"], $usuario["password"])){
	          $_SESSION["usuarioLogueado"] = $usuario;
	          header("Location: index.php");
	        }else{
	          array_push ($errores, "*There was an error, please try again.");
			  break;
	        }
	      }
	    }
	  }
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

							<?php if (count($_POST) && ($errores)) : ?>
			                    <div class="alert alert-danger">
			                    	<h4><strong>Oops!</strong></h4>
			                        <?php foreach ($errores as $error): ?>
			                            <p><?php echo $error ?></p>
			                        <?php endforeach; ?>
			                    </div>
			                <?php endif; ?>

							<form class="form login-form" action="login.php" method="post">
								<input type="text" placeholder="Username" name="name"
								value="<?php if (isset($_COOKIE['name'])) {
											echo $_COOKIE['name'];
										} elseif (isset($name)){
											echo $name;
										}

										?>"
									>
								<input type="password" placeholder="Password" name="password"
								value="<?php if (isset($_COOKIE['password'])) { echo $_COOKIE['password']; } ?>">
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
