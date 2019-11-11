<?php
	/* Script para guardar los datos del usuario actual en la sesion desde la base de datos mysql */

 	require_once("includes/pdo.php");

	$consulta = $db->prepare("SELECT * FROM user");
	$consulta->execute();
	$usuarios = $consulta->fetchAll(PDO::FETCH_ASSOC);

	session_start();

	if (isset($_SESSION["usuarioLogueado"])){
	    foreach ($usuarios as $usuario){
 			$userName = $_SESSION["usuarioLogueado"]["name"];
 			$userLastName = $_SESSION["usuarioLogueado"]["last_name"];
 			$userId = $_SESSION["usuarioLogueado"]["id"];
 			$userMail = $_SESSION["usuarioLogueado"]["email"];
	    }
	}

?>