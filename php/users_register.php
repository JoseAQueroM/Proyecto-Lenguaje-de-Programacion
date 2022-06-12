<?php

include("db_conexion.php");


$nombre_user = strtoupper(trim($_POST['usuario']));
$password_user =trim(md5($_POST['password']));
$correo_user = strtoupper(trim($_POST['email']));



$verificar_correo = mysqli_query($conex, "SELECT * FROM users_register WHERE correo='$correo_user'");
$verificar_usuario = mysqli_query($conex, "SELECT * FROM users_register WHERE nombre='$nombre_user'");

if (mysqli_num_rows($verificar_correo) > 0) {
    ?>
    <script>
        alert("Este correo ya existe, intenta con otro");
        window.location = '../unirte.php'; 
    </script>
    <?php
   
}else if (mysqli_num_rows($verificar_usuario) >0){
    ?>
    <script>
        alert("Este nombre de usuario ya existe, intenta con otro");
        window.location = '../unirte.php'; 
    </script>
    <?php
}else{
    ?>
    <script>
        alert("Te has registrado correctamente");
        window.location = '../index.php'; 
    </script>
    <?php 
    $insertar = "INSERT INTO users_register(nombre, clave,correo)
    VALUES ('$nombre_user','$password_user','$correo_user')";
    $ejecutarInsert = mysqli_query($conex, $insertar);
}

