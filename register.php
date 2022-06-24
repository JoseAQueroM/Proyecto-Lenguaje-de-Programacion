<?php
include("php/db_conexion.php");
include("php/users_register.php");
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
                <h2>Registro</h2>
                <form class="form" id="formulario" action="" method="POST">
                    <div class="form__usuario formulario__grupo"  id="grupo__usuario">
                        <input class="formulario__input" name="usuario" type="text" placeholder="Nombre de Usuario">
                        <p class="errors">El nombre tiene que ser de 4 a 16 dígitos <br> y solo puede contener texto.</p>
                    </div>
                    <div class="form__pass formulario__grupo " id="grupo__pass">
                        <input class="formulario__input" name="password" type="password" placeholder="Contraseña">
                        <p class="errors ">La contraseña tiene que ser <br> de 4 a 12 dígitos.</p>
                    </div>
                    <div class="form__correo formulario__grupo" id="grupo__correo">
                        <input class="formulario__input"  name="email" type="email" placeholder="Correo">
                        <p class="errors">El correo solo puede contener <br> letras, numeros, puntos, guiones y guion bajo.</p>
                    </div>
                    <?php echo $men;?>
                    <div class="form__enviar formulario__grupo" >
                        <p class="errors-mensaje">Por favor complete todo los campos</p>
                    </div>
                    
                    <input name="registrar" class="btn button-Login" type="submit" value="Registar">
                    
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
                </footer>
        </div>
        <script src="js/validarForm.js"></script>
        <script src="js/main.js"></script>
</body>
</html>

