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
    <div>
        
        
        <div class="">

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
                            <h3 class="titulo"><?php echo $todo['titulo'] ?></h3>
                            <p class="texttodo"><?php echo $todo['descri'] ?></p>
                            <div class="grupoBotones">
                                <a href="<?php echo 'eliminar.php?id='.$todo["id"];?>" type="button" class="grupob">Eliminar</a>
                                <a href="<?php echo 'editar.php?id='.$todo["id"];?>" type="button" class="grupob">Editar</a>
                            </div>
                            <small><?php echo $todo['fecha'] ?></small>
                        </div><?php

                            }
                        }
                                ?>


            </div>
        </div>

    </div>
    
    <script src="js/main.js"></script>
</body>

</html>