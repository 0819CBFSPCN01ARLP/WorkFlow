<?php

session_start();
if (isset($_SESSION["usuarioLogueado"])){
	header("Location: index.php");
}

$errores=array();

if (count($_POST))  {

	$name = null;

  $name = trim($_POST["name"]);
  $password = $_POST["password"];

// Name
  if (empty($name)) {
    array_push($errores, "*El campo de usuario está vacío.");
  }

// Password
  if (empty($password)) {
    array_push($errores, "*El campo de contraseña está vacío.");
    }

		//Guardar info en cookies
		if ( $_POST["guardar_clave"] == "1"){
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
          array_push ($errores, "*Hubo un error; verifique los datos.");
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

							<form class="login-form" action="login.php" method="post">
								<input type="text" placeholder="username" name="name"
								value="<?php if (isset($_COOKIE['name'])) {
											echo $_COOKIE['name'];
										} elseif (isset($name)){
											 echo $name;
										}
										?>"
									>
								<input type="password" placeholder="password" name="password"
								value="<?php if (isset($_COOKIE['password'])) {
                      echo $_COOKIE['password'];
                    } ?>">
								<input type="submit" name="submit" value="Login">

								<label><input type="checkbox" id="cbox1" name="guardar_clave" value="1" > Recordar Usuario</label>

								<p class="message">Not registered? <a href="registro.php">Create an account</a></p>

								<?php if (count($_POST) && ($errores)) : ?>
                    <ul style="color: #f00;">
                        <?php foreach ($errores as $error): ?>
                            <li> <?php echo $error ?> </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

							</form>

						</div>
					</div>
				</article><!-- END:ARTICLE -->

			</section><!-- END:MAIN-CONTENT-COLUMN -->

	</main>

	</body>
</html>
