<?php

session_start();

$_SESSION['user_name'] =  null;
$_SESSION['password'] =  null;
$_SESSION['user_role'] =  null;

header("Location: ../index.php");
?>