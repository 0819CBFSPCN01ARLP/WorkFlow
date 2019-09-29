<?php

$pathUsuarios = "db/usuario.json";
$arrayUsuarios= [];


if(file_exists($pathUsuarios)){
  $usuarioJson = file_get_contents($pathUsuarios);

  $arrayUsuarios = json_decode($usuarioJson,true);
}

// guardar datos en un array con contraseña encriptada
$usuario = [
  "id" => count($arrayUsuarios),
  "name"=> $_POST["name"],
  "email"=> $_POST["email"],
  "password"=> password_hash($_POST["password"] , PASSWORD_DEFAULT),
  "password_verify" => password_hash($_POST["password_verify"] , PASSWORD_DEFAULT)
];

// AGREGAMOS USUARIO NUEVO A ARRAY DE USUARIOS
$arrayUsuarios[] = $usuario;


// CONVERTIMOS A JSON EL ARRAY DE USUARIO
$usuarioJSON = json_encode($arrayUsuarios, JSON_PRETTY_PRINT);


// GUARDAR EL USUARIO A UN ARCHIVO
file_put_contents("db/usuario.json", $usuarioJSON);


// ____________________

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

if (isset($_POST["submit"])) {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $password_verify = $_POST["password_verify"];

  $errores=array();

// Name
  if (empty($name)) {
    array_push($errores, "*El campo de nombre de usuario está vacío.");
      } elseif (strlen($name) < 8) {
        array_push ($errores, "*El nombre de usuario debe tener al menos 8 caracteres.");
        }

// email
  if (empty($email)) {
    array_push($errores, "*El campo de mail está vacío.");
      } elseif (!filter_var($email , FILTER_VALIDATE_EMAIL)){
        array_push ($errores, "*El email es inválido.");
        }

// Password
  if (empty($password)) {
    array_push($errores, "*El campo de contraseña está vacío.");
      } elseif (!preg_match('`[0-9]`',$password)) {
        array_push ($errores, "*La contraseña debe tener al menos un carácter numérico.");
        }

// Password verify
  if ($password != $password_verify) {
    array_push($errores, "*Las contraseñas ingresadas no coinciden.");
    }

// Mostrar errores:
  if (count($errores) > 0){
      echo "<div class='error'>";
      for ($i=0; $i < count($errores) ; $i++) {
        echo "<li>" .$errores[$i]."</div>";
        }
      } else {
        header("Location: index.php");
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
							<h1 class="mb-5 text-center"><strong>Register</strong></h1>

							<form class="register-form" action="registro.php" method="post">
								<input type="text" placeholder="User name" name="name" value="<?php if(isset($name)) echo $name ?>">
								<input type="text" placeholder="email address" name="email" value="<?php if(isset($email)) echo $email ?>">
								<input type="password" placeholder="password" name="password" value="<?php if(isset($password)) echo $password ?>">
								<input type="password" placeholder="password verify" name="password_verify">

								<input type="submit" name="submit" value="Register">
								<p class="message">Already registered? <a href="login.php">Sign In</a></p>
								
							</form>

						</div>
					</div>
				</article><!-- END:ARTICLE -->

			</section><!-- END:MAIN-CONTENT-COLUMN -->


	</main>

	</body>
</html>
