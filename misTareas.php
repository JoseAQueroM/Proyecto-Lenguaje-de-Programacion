<?php
session_start();
include('./php/db_conexion.php');

if (!isset($_SESSION['correo_login'])) {
    header("location: login.php");
    die();
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
    <link rel="stylesheet" href="css/mistareas.css" />
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
                    <a href="to_do_list.php">Agregar Tarea</a>
                </li>

                <li>
                    <a href="salir.php"><img src="./icons/login.svg" />Salir</a>
                </li>
            </ul>
            <span class="barra">
                <img src="./icons/hamburger-menu-svgrepo-com.svg" />
            </span>
        </nav>

    </header>
    <main>
        
        
        <div class="encabezado">

            <div class="contenedor">
                <?php
                $sql = "SELECT id FROM users_register where correo='{$_SESSION["correo_login"]}' ";
                $rest = mysqli_query($conex, $sql);
                $contar = mysqli_num_rows($rest);
                if ($contar > 0) {
                    $row = mysqli_fetch_assoc($rest);
                    $id_user = $row["id"];
                } else {
                    $id_user = 0;
                }

                $sql1 = "SELECT * FROM tareas where id_user='{$id_user}' ORDER BY id DESC";
                $rest1 = mysqli_query($conex, $sql1);

                if (mysqli_num_rows($rest1) > 0) {
                    foreach ($rest1 as $todo) {
                ?> 
                <div class="card_body">
                            <h2 class="titulo"><?php echo $todo['titulo'] ?></h2>
                            <p class="texttodo"><?php echo $todo['descri'] ?></p>
                            <div class="grupoBotones">
                                <button type="button" class="grupob">Ver</button>
                                <button type="button" class="grupob">Editar</button>
                            </div>
                            <small><?php echo $todo['fecha'] ?></small>
                        </div><?php

                            }
                        }
                                ?>


            </div>
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