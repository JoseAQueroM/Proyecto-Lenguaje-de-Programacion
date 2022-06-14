<?php
session_start();

if (!isset($_SESSION['correo_login'])) {
    header("location: login.php");
    die();
}

?>
<h1>hello</h1>