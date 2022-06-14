<?php 
if (isset($_POST['registrar'])){

$nombre_user = strtoupper(trim($_POST['usuario']));
$password_user = trim(md5($_POST['password']));
$correo_user = strtoupper(trim($_POST['email']));


$verificar_correo = mysqli_query($conex, "SELECT * FROM users_register WHERE correo='$correo_user'");
$verificar_usuario = mysqli_query($conex, "SELECT * FROM users_register WHERE nombre='$nombre_user'");

if (mysqli_num_rows($verificar_correo) > 0) {
    ?>
       <h3 class="msj_error">Este correo ya existe, intenta con otro</h3>
    <?php
    
    } else if (mysqli_num_rows($verificar_usuario) > 0) {
        ?>
            <h3 class="msj_error">Este nombre de usuario ya existe, intenta con otro</h3>
        <?php
        }else {
            ?>
                <h3 class="msj_correcto">Te has registrado correctamente</h3>
            <?php
                $insertar = "INSERT INTO users_register(nombre, clave,correo)
                VALUES ('$nombre_user','$password_user','$correo_user')";
                $ejecutarInsert = mysqli_query($conex, $insertar);
            }
}            
?>