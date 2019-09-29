<?php

if (isset($_POST["submit"])) {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $message = $_POST["message"];

  $errores=array();

// Name
  if (empty($name)) {
    array_push($errores, "*El campo de usuario está vacío.");
  } elseif (strlen($name) < 8) {
    array_push ($errores, "*El nombre de usuario debe tener al menos 8 caracteres.");
    }

// email
  if (empty($email)) {
    array_push($errores, "*El campo de mail está vacío.");
    } elseif (!filter_var($email , FILTER_VALIDATE_EMAIL)){
    array_push ($errores, "*El email es inválido.");
    }

// Message
  if (empty($message)) {
    array_push($errores, "*El campo de mensaje está vacío.");
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
