<?php
session_start();

include('php/db_conexion.php');


$msg ="";
if (isset($_POST["recuperar"])) {

    $digitos = 6;
    $generarClave  = substr(microtime(), 1, $digitos); 
    $clave = $generarClave;

    $obtenerCorreo= trim($_REQUEST['correo_usuario']); 
    $sql = "SELECT * FROM users_register WHERE correo='$obtenerCorreo'";
    $res = mysqli_query($conex, $sql);
    $contador = mysqli_num_rows($res);
    $data = mysqli_fetch_array($res);

    if($contador == 0){ 
        // header("location: login.php");
        echo "error";
        exit();
    }else if ($contador > 0){
        echo "todo bien";
        $msg ="Clave enviada correctamente al correo.";
        $cambiarClave   = "UPDATE users_register SET clave='$clave' WHERE correo='$obtenerCorreo' ";
        $query   = mysqli_query($conex,$cambiarClave); 


        $destino = $obtenerCorreo; 
        $asunto = "Recuperar Clave - To Do List";
        $mensaje = "<h1>Tu nueva clave es: '.$clave.'</h1>";
        $correoMio = "From: gutierrezfabrizio03@gmail.com";

        

        mail($destino,$asunto,$mensaje,$correoMio);
    }

}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalice.css">
    <link rel="icon" href="img/icon-to-do.png">
    <link rel="stylesheet" href="css/main.css">
    <title>To Do List</title>
</head>

<body class="unirte">
    <header class="header">

        <nav class="nav">
            <div class="logo">
                <img src="./img/to-do-logo.png" alt="logo">
                <h3>To Do <br> Lo que tengo que hacer</h3>
            </div>
            <ul class="ul">
                <li><a href="index.php"><img src="./icons/home.svg"> Home</a></li>
                <li><a href="aboutUs.php"><img src="./icons/about us.svg"> About Us</a></li>
                <li><a href="login.php"><img src="./icons/login.svg"> Login</a></li>
            </ul>
            <span class="barra">
                <img src="./icons/hamburger-menu-svgrepo-com.svg" />
            </span>
        </nav>
    </header>
    <div>

        <div class="register-contenedor">
            <div class="registrar">
                <h2>Recuperar Contraseña</h2>
                <form action="" method="POST">

                    <p class="getPassText">Por favor coloque su correo electrico para poder recuperar su contraseña.</p>

                    <input name="correo_usuario" type="text" placeholder="Correo">

                    <p><?php $msg =""; ?></p>

                    <input name="recuperar" class="btn button-Login" type="submit" value="Recordar clave">


                </form>
            </div>
        </div>



    </div>
    <footer class="footer">
        <div class="footer-contenedor">
            <div class="contacto">
                <h4>Contacto <a href="#"><img src="./icons/png/color/001-whatsapp.png"></a> </h4>

            </div>
            <div class="logo modificar">
                <img src="./img/to-do-logo.png" alt="logo">
                <h3>To Do <br> Lo que tengo que hacer</h3>
            </div>
            <div class="redes">
                <a href="#"><img src="./icons/png/002-facebook.png"></a>
                <a href="#"><img src="./icons/png/004-gorjeo.png"></a>
                <a href="#"><img src="./icons/png/003-instagram.png"></a>
            </div>
        </div>
        <script src="js/main.js"></script>
    </footer>
</body>

</html>