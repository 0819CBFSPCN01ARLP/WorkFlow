<?php
require_once("includes/session-pdo.php");
session_destroy();
header('Location: login.php');
?>
