<?php

include('db_conexion.php');
session_start();

if (isset($_SESSION['correo_login'])) {
    header("location: to_do_list.php");
    die();
}


if (isset($_POST['entrar'])) {
    $correo_usuario = mysqli_real_escape_string($conex, $_POST['correo_usuario']);
    $clave = mysqli_real_escape_string($conex, md5($_POST['user_pass']));


    if (validarUsuario($correo_usuario)) {
        if (validarLogin($correo_usuario, $clave)) {
            $_SESSION['correo_login'] = $correo_usuario;
            header("location: to_do_list.php");
            die();
        } else {

            echo '<p class="errors errors-activo">Clave invalida</p>';
        }
    } else {

        echo '<p class="errors errors-activo">Correo invalido</p>';
    }
}
