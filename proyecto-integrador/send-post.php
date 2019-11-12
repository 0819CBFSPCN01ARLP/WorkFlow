<?php
/* Script para enviar posts */
require_once('includes/session-pdo.php');

if (count($_POST)) {
	$post = $_POST["post"];
	$insertar = $db->prepare("INSERT into post
	values (null, :post, null, null, :userId, NOW() )");
	$insertar -> execute([
		":post"=>$post,
		":userId"=>$userId
	]);
}

header('Location: ' . $_SERVER['HTTP_REFERER']);

?>