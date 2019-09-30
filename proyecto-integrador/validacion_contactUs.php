<?php

if (isset($_POST["submit"])) {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $message = $_POST["message"];

  $errores=array();

// Name
  if (empty($name)) {
    array_push($errores, "*The username field is empty.");
  } elseif (strlen($name) < 8) {
    array_push ($errores, "*The username must have at least 8 characters.");
    }

// email
  if (empty($email)) {
    array_push($errores, "*The email field is empty.");
    } elseif (!filter_var($email , FILTER_VALIDATE_EMAIL)){
    array_push ($errores, "*The email is invalid. Please try again.");
    }

// Message
  if (empty($message)) {
    array_push($errores, "*The message field is empty.");
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
