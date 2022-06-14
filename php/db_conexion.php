<?php
function condb (){
    $sv = "localhost";
    $user = "root";
    $clv = "";
    $db = "db_todolist";
    
    
    $conex = mysqli_connect($sv, $user, $clv, $db);
    return $conex;
}

$conex = condb();


function validarUsuario($correo_usuario){
    $conn = condb();
    $query = "SELECT correo FROM users_register WHERE correo='$correo_usuario'";
    $ejecutarQuery = mysqli_query($conn, $query);
    $contar = mysqli_num_rows($ejecutarQuery);
    if($contar >0){
        return true;
    }else{
        return false;
    }
}
function validarLogin($correo_usuario, $clave){
    $conn = condb();
    $query = "SELECT correo FROM users_register WHERE correo='$correo_usuario' and clave='$clave'";
    $ejecutarQuery = mysqli_query($conn, $query);
    $contar = mysqli_num_rows($ejecutarQuery);
    if($contar >0){
        return true;
    }else{
        return false;
    }
}
