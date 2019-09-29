<?php

if (isset ($_POST["submit"])) {
  $name = $_POST["name"];
  $password = $_POST["password"];

  $errores=array();

// Name
  if (empty($name)) {
    array_push($errores, "*El campo de usuario está vacío.");
  } elseif (strlen($name) < 8) {
    array_push ($errores, "*El nombre de usuario debe tener al menos 8 caracteres.");
    }

// Password
  if (empty($password)) {
    array_push($errores, "*El campo de contraseña está vacío.");
    } elseif (!preg_match('`[0-9]`',$password)) {
    array_push ($errores, "*La contraseña debe tener al menos un carácter numérico.");
    }


// Mostrar errores:
  if (count($errores) > 0){
      echo "<div class='error'>";
      for ($i=0; $i < count($errores) ; $i++) {
        echo "<li>" .$errores[$i]."</div>";
        }
      // } else {
      //   header("Location: index.php");
      }
  }



    session_start();
    if (isset($_SESSION["usuarioLogueado"])){
      header("Location: index.php");}

    if ($_POST){
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
            header("Location: error.php");
        }
      }
    }

    return header("Location: index.php");
  }




 ?>
