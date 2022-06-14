<?php

include('db_conexion.php');
session_start();

if (isset($_SESSION['correo_login'])) {
    header("location: to_do_list.php");
    die();
}

if (isset($_POST['entrar'])) {
    $correo_usuario = $_POST['correo_usuario'];
    $clave = md5($_POST['user_pass']);


    if (validarUsuario($correo_usuario)) {
        if (validarLogin($correo_usuario, $clave)) {
            $_SESSION['correo_login'] = $correo_usuario;
            header("location: to_do_list.php");
            die();
        } else {
?>
            <h3 class="login-error">!Clave invalida!.</h3>
        <?php
        }
    } else {
        ?>
        <h3 class="login-error">!Correo invalido!.</h3>
<?php

    }
}
?>