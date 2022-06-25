<?php
session_start();
include('./php/db_conexion.php');

if (!isset($_SESSION['correo_login'])) {
    header("location: login.php");
    die();
}


if (isset($_GET["id"])) {


    $idTarea = mysqli_real_escape_string($conex, $_GET["id"]);

    $sql = "SELECT id FROM users_register where correo='{$_SESSION["correo_login"]}' ";
    $rest = mysqli_query($conex, $sql);
    $contar = mysqli_num_rows($rest);
    if ($contar > 0) {
        $row = mysqli_fetch_assoc($rest);
        $id_user = $row["id"];
    } else {
        $id_user = 0;
    }

    $sql = "DELETE FROM tareas WHERE id='{$idTarea}' AND id_user='{$id_user }'";
    mysqli_query($conex, $sql);
    header("Location: misTareas.php");

} else {
    header("location: misTareas.php ");
}
?>