<?php


$dsn = "mysql:host=localhost;dbname=grupoUnoWorkflow;port=3306";
$username = "root";
$password = "";

$db = new PDO($dsn, $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 ?>
