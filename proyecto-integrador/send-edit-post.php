<?php
/* Script para mofificar posts */
require_once('includes/session-pdo.php');

if (count($_POST)) {
	$post = $_POST["post"];
  $postId = $_POST["id"];
	$insertar = $db->prepare("UPDATE post SET text = :text WHERE id = :id");
	$insertar->execute([
		":text"=>$post,
		":id"=>$postId
	]);
}

header('Location: ' . $_POST['nextUrl']);

?>
