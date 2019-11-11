<?php
/* Script para eliminar posts */
require_once('includes/session-pdo.php');
$delete_post = $db->prepare("DELETE FROM post WHERE id = :id");
$delete_post->execute([":id"=>$_GET["postId"]]);

header('Location: ' . $_SERVER['HTTP_REFERER']);
?>