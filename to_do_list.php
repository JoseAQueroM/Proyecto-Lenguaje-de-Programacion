<?php
session_start();
include('./php/db_conexion.php');

if (!isset($_SESSION['correo_login'])) {
    header("location: login.php");
    die();
}

$msj = "";
if (isset($_POST['agregar'])) {
    $titulo = mysqli_real_escape_string($conex, $_POST['titulo']);
    $desc = mysqli_real_escape_string($conex, $_POST['desc']);
    $sql = "SELECT id FROM users_register where correo='{$_SESSION["correo_login"]}' ";
    $rest = mysqli_query($conex, $sql);
    $contar = mysqli_num_rows($rest);
    if ($contar > 0) {
        $row = mysqli_fetch_assoc($rest);
        $id_user = $row["id"];
    } else {
        $id_user = 0;
    }
    $sql = null;

    $sql = "INSERT INTO tareas (titulo, descri, id_user) VALUES ('$titulo', '$desc','$id_user')";
    $rest = mysqli_query($conex, $sql);
    if ($rest) {
        $_POST["titulo"] = "";
        $_POST["desc"] = "";
        $msj = "<div class='todo_listo'>Tarea agregada correctamente</div>";
    } else {
        $msj = "<div class='todo_mal'>Error al agregar la tarea. <br> Intente nuevamente</div>";
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
                    <a href="misTareas.php">Mis Tareas</a>
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
        <div class="encabezado">
            <form action="" method="POST" class="form-todo">
                <div class="card-Container">
                    <label for="title">
                        <h1 class="card-Title">Crear To Do</h1>
                        <input type="text" placeholder="¿Qué actividad realizarás?" class="input-Card" name="titulo" required value="<?php if (isset($_POST["agregar"])) {
                                                                                                                                            echo $_POST["titulo"];
                                                                                                                                        } ?>">
                        <br>
                        <textarea class="textarea" placeholder="Descripción" name="desc" required><?php if (isset($_POST["agregar"])) {
                                                                                                                                            echo $_POST["titulo"];
                                                                                                                                        } ?></textarea>
                        <div>
                            <?php echo $msj; ?>
                            <button type="submit" name="agregar" class="button-Add">Agregar To do</button>
                            <button type="reset" class="button-Add">Resetear</button>

                        </div>



                    </label>


                </div>
            </form>
        </div>
    </div>
    
    <script src="js/main.js"></script>
</body>

</html>