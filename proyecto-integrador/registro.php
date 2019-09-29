<?php
$errores=array();

if (count($_POST)) {

// _________// validaciones de errores:

$name = null;

	// Variables para persisitir la info:
	$name = trim($_POST["name"]);
	$email = trim($_POST["email"]);
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

// Profile image
  if ($_FILES){
    if ($_FILES["profile_img"]["error"] != 0) {
      array_push ($errores, "Hubo un error en la carga de la imagen. Por favor, intentelo nuevamente.");
    } else {
      $ext = pathinfo($_FILES["profile_img"]["name"], PATHINFO_EXTENSION);
      if ($ext != "jpg" && $ext != "jpeg" && $ext != "png"){
        array_push ($errores, "La imagen debe ser jpg, jpeg, o png.");
      }
    }
  }


// Mostrar errores:
  if (!$errores){

      // echo "<div class='error'>";
      // for ($i=0; $i < count($errores) ; $i++) {
      //   echo "<li>" .$errores[$i]."</div>";
      //   }
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

        //Guardar info en cookies
        if ($_POST["guardar_clave"]== "1"){
           setcookie("name", $name, time() + 365 * 24 * 60 * 60);
           setcookie("password", $password, time() + 365 * 24 * 60 * 60);
        }

        // Profile image
        if ($_FILES && $_FILES["profile_img"]["error"] == 0){
          $ext = pathinfo($_FILES["profile_img"]["name"], PATHINFO_EXTENSION);

          if ($ext == "jpg" || $ext == "jpeg" || $ext == "png"){
            $usuario["profile_img"] = "profile-" . trim($usuario["name"]) . "." . $ext;
            move_uploaded_file($_FILES["profile_img"]["tmp_name"], "img/profile-" . trim($usuario["name"]) . "." . $ext);
          }
        }


        // AGREGAMOS USUARIO NUEVO A ARRAY DE USUARIOS
        $arrayUsuarios[] = $usuario;

        // CONVERTIMOS A JSON EL ARRAY DE USUARIO
        $usuarioJSON = json_encode($arrayUsuarios, JSON_PRETTY_PRINT);


        // GUARDAR EL USUARIO A UN ARCHIVO
        file_put_contents("db/usuario.json", $usuarioJSON);

        header("Location: registro-success.php");

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

							<form class="register-form" action="registro.php" method="post" enctype="multipart/form-data">
								<input type="text" placeholder="User name" name="name" value="<?php if(isset($name)) echo $name ?>">
                <input type="text" placeholder="email address" name="email" value="<?php if(isset($email)) echo $email ?>">
                <input type="password" placeholder="password" name="password">
								<input type="password" placeholder="password verify" name="password_verify">
                <label for="pi">Add profile picture</label>
                <input id="pi" type="file" name="profile_img">

								<input type="submit" name="submit" value="Register">

                <label><input type="checkbox" id="cbox1" name="guardar_clave" value="1" > Recordar Usuario</label>

								<p class="message">Already registered? <a href="login.php">Sign In</a></p>

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
