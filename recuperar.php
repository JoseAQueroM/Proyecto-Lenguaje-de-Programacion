<?php

include('php/db_conexion.php');

$contar_correo=0;
$correo = '';


if(isset($_POST['recuperar'])){
    $correo = strtoupper(trim($_POST['recuperar_clave']));
   
    

    if($contar_correo == 0){

    
    $verificar_correo = mysqli_query($conex, "SELECT * FROM users_register WHERE correo = '$correo'");
    $contar_correo = mysqli_num_rows($verificar_correo);
    

    }

   if(isset($_POST['recuperar2']) && $contar_correo > 0) {
        $pregunta1 = strtoupper(trim($_POST['pregunta1']));
        $pregunta2 = strtoupper(trim($_POST['pregunta2']));

        $verificar_pregunta1 = mysqli_query($conex, "SELECT * FROM users_register WHERE  correo = '$correo' AND pregunta1 = '$pregunta1'");
        $contar_pregunta1 = mysqli_num_rows($verificar_pregunta1);
        

        if($contar_pregunta1 > 0){
        echo "La respuesta numero 1 es correcta";
        } 

        $verificar_pregunta2 = mysqli_query($conex, "SELECT * FROM users_register WHERE  correo = '$correo' AND pregunta2 = '$pregunta2'");
        $contar_pregunta2 = mysqli_num_rows($verificar_pregunta2);

        if($contar_pregunta2 > 0){
            echo "La respuesta numero 2 es correcta";
        } 

        

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

                    <p class="getPassText">Por favor responda las preguntas seguridad</p>
                    
                    <?php
                    
                    if($contar_correo == 0){  

                    ?>


                    <input name="recuperar_clave" type="email" placeholder="Correo">
                    <input name="recuperar" class="btn button-Login" type="submit" value="Recordar clave">

                    <?php } ?>

                    <?php
                    if($contar_correo > 0){  

                    ?>

                    <input name="recuperar_clave" type="email" placeholder="Correo" disabled value = <?php echo $correo ?> >
                    <input name="pregunta1" type="text" placeholder="Comida favorita">
                    <input name="pregunta2" type="text" placeholder="Color favorito">
                    <input name="recuperar2" class="btn button-Login" type="submit" value="Recordar clave">

                    <?php } ?>  
                   
                    


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