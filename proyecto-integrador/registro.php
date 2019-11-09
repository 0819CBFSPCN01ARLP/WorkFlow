<?php
require_once('includes/header.php');
$errores=array();
$name = null;

if (count($_POST)) {

	// Variables para persisitir la info:
	$name = trim($_POST["name"]);
	$lastname = trim($_POST["last_name"]);
	$email = trim($_POST["email"]);
	$password = $_POST["password"];
	$password_verify = $_POST["password_verify"];
	if(isset($_POST['rememberme']) && $_POST['rememberme']){
		$rememberme =  $_POST['rememberme'];
	}

	$errores=array();


  // Name
  if (empty($name)) {
    array_push($errores, "*The username field is empty.");
      } elseif (strlen($name) < 8) {
        array_push ($errores, "*The username must have at least 8 characters.");
        }

  // email
	foreach ($usuarios as $usuario){
			if ($email == $usuario["email"]){
					array_push($errores, "*This email address is already in use. Please use another one.");
			}
	}

  if (empty($email)) {
    array_push($errores, "*The email field is empty.");
      } elseif (!filter_var($email , FILTER_VALIDATE_EMAIL)){
        array_push ($errores, "*The email is invalid. Please try again.");
        }

  // Password
  if (empty($password)) {
    array_push($errores, "*The password field is empty.");
      } elseif (!preg_match('`[0-9]`',$password)) {
        array_push ($errores, "*The password must have at least one numeric character.");
        }

  // Password verify
  if ($password != $password_verify) {
    array_push($errores, "*The passwords don't match.");
    }

  // Profile image
  if ($_FILES){
    if ($_FILES["profile_img"]["error"] != 0) {
      array_push ($errores, "*There was an error uploading the file. Please try again.");
    } else {
      $ext = pathinfo($_FILES["profile_img"]["name"], PATHINFO_EXTENSION);
      if ($ext != "jpg" && $ext != "jpeg" && $ext != "png"){
        array_push ($errores, "*The image extension must be jpg, jpeg, o png.");
      }
    }
  }


  // Mostrar errores:
  if (!$errores){
				//Guardar info en cookies
				if(isset($_POST['rememberme']) && $_POST['rememberme']){
					 setcookie("name", $name, time() + 365 * 24 * 60 * 60);
				}

				$password =  password_hash($_POST["password"] , PASSWORD_DEFAULT);
				$password_verify =  password_hash($_POST["password"] , PASSWORD_DEFAULT);

				$insertar = $db->prepare("INSERT into user
				values (null, '$name', '$lastname', '$email', '$password', '$password_verify', '$rememberme', null, NOW(), null )");
				$insertar -> execute();

				session_start();
        header("Location: registro-success.php");

        /*$pathUsuarios = "db/usuario.json";
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

        */

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
              <?php if (count($_POST) && ($errores)) : ?>
                  <div class="alert alert-danger">
                      <h4><strong>Oops!</strong></h4>
                      <?php foreach ($errores as $error): ?>
                          <p><?php echo $error ?></p>
                      <?php endforeach; ?>
                  </div>
              <?php endif; ?>
							<form class="form register-form" action="registro.php" method="post" enctype="multipart/form-data">
								<input type="text" placeholder="Name" name="name" value="<?php if(isset($name)) echo $name ?>">
								<input type="text" placeholder="Last name" name="last_name" value="<?php if(isset($lastname)) echo $lastname ?>">
                <input type="text" placeholder="Email Address" name="email" value="<?php if(isset($email)) echo $email ?>">
                <input type="password" placeholder="Password" name="password">
								<input type="password" placeholder="Password Verify" name="password_verify">

                <!-- <label for="pi">Add profile picture</label>
                <input id="pi" type="file" name="profile_img"> -->

                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="cbox1" name="rememberme" value="0">
                  <label class="form-check-label" for="cbox1">Remember me</label>
                </div>
								<button class=" contact-but btn btn-outline-info btn-block z-depth-0 my-4 waves-effect" name="submit" type="submit">REGISTER</button>
								<p class="message">Already registered? <a href="login.php">Sign In</a></p>
							</form>
						</div>
					</div>
				</article><!-- END:ARTICLE -->

			</section><!-- END:MAIN-CONTENT-COLUMN -->


	</main>

	</body>
</html>
