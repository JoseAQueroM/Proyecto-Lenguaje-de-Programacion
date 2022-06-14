<?php

session_start();
unset($_SESSION['correo_login']);
session_destroy();
header("location: index.php");
?>