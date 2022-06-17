<?php
session_start();
include('./php/db_conexion.php');

if (!isset($_SESSION['correo_login'])) {
    header("location: login.php");
    die();
}

if(isset($_POST["agregar"])){
    $title = mysqli_real_escape_string($conex, $_POST["title"]);
    $description = mysqli_real_escape_string($conex, $_POST["desc"]);
    $sql = "SELECT id FROM users_register WHERE correo_usuario = '{$_SESSION['correo_login']}'";
    $res = mysqli_query($conex, $sql);
    $count = mysqli_num_rows($res);
    if($count > 0){
        $row = mysqli_fetch_assoc(($res));
        $user_id = $row["id"];
        echo $user_id;
        die();
    } else {
        $user_id = 0;
    }
   
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/normalice.css" />
    <link rel="icon" href="img/icon-to-do.png" />
    <link rel="stylesheet" href="css/main.css" />
    <title>To Do List</title>
</head>

<body class="body">
    <header class="header">
        <nav class="nav">
            <div class="logo">
                <img src="./img/to-do-logo.png" alt="logo" />
                <h3>
                    To Do <br />
                    Lo que tengo que hacer
                </h3>
            </div>
            <ul class="ul">
                <li>
                    <a href="index.php"><img src="./icons/home.svg" /> Home</a>
                </li>
                <li>
                    <a href="aboutUs.php"><img src="./icons/about us.svg" /> About Us</a>
                </li>
                <li>
                    <a href="salir.php"><img src="./icons/login.svg"/>Logout</a>
                </li>
            </ul>
            <span class="barra">
                <img src="./icons/hamburger-menu-svgrepo-com.svg" />
            </span>
        </nav>

    </header>
    <main>
        <div class="encabezado">
            <form action="" method="POST" class="form-todo">
                 <div class="card-Container">
                    <label for="title">
                        <h1 class="card-Title">Crear evento</h1>
                        <input type="text" placeholder="¿Qué actividad realizarás?" class="input-Card" name="title"  required>
                        <br>
                        <input type="text" placeholder="Descripción" class="description-Card" name="desc" required>
                        <div>

                        <button type="submit" name="agregar" class="button-Add">Agregar Evento</button>
                        <button type="reset" class="button-Add">Resetear</button>

                        </div>
                       
                    

                    </label>
                    
                    
                </div>
            </form>
        </div>
    </main>
    <footer class="footer">
        <div class="footer-contenedor">
            <div class="contacto">
                <h4>
                    Contacto
                    <a href="#"><img src="./icons/png/color/001-whatsapp.png" /></a>
                </h4>
            </div>
            <div class="logo modificar">
                <img src="./img/to-do-logo.png" alt="logo" />
                <h3>
                    To Do <br />
                    Lo que tengo que hacer
                </h3>
            </div>
            <div class="redes">
                <a href="#"><img src="./icons/png/002-facebook.png" /></a>
                <a href="#"><img src="./icons/png/004-gorjeo.png" /></a>
                <a href="#"><img src="./icons/png/003-instagram.png" /></a>
            </div>
        </div>
    </footer>
    <script src="js/main.js"></script>
</body>

</html>