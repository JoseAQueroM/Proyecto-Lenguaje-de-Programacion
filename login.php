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
    <main>

        <div class="register-contenedor">
            <div class="registrar">
                <h2>Login</h2>
                <form action="" method="POST">
                    <input name="correo_usuario" type="email" placeholder="Correo">
                    <input name="user_pass" type="password" placeholder="Contraseña">
                    
                    <p><?php include('php/users_login.php'); ?></p>
                    <input name="entrar" class="btn button-Login" type="submit" value="Entrar">
                    <a href="recuperar.php" class="recuperar">¿Has olvidado tu contraseña?</a>
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