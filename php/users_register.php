<?php

$usuario = '/^[a-zA-Z0-9\_\-]{4,16}$/';
$correo = '/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/';
$men = '';
if (isset($_POST['registrar'])) {

    if (strlen($_POST['usuario']) >= 4 &&  strlen($_POST['usuario']) <= 16) {
        if (strlen($_POST['password']) >= 4 && strlen($_POST['password']) <= 12) {
            if (preg_match($usuario, $_POST["usuario"])) {
                if (preg_match($correo, $_POST["email"])) {
                    $nombre_user = strtoupper(trim($_POST['usuario']));
                    $password_user = trim(md5($_POST['password']));
                    $correo_user = strtoupper(trim($_POST['email']));

                    $verificar_correo = mysqli_query($conex, "SELECT * FROM users_register WHERE correo='$correo_user'");
                    $verificar_usuario = mysqli_query($conex, "SELECT * FROM users_register WHERE nombre='$nombre_user'");
                    $contarCorreo = mysqli_num_rows($verificar_correo);
                    $contarUsuario = mysqli_num_rows($verificar_usuario);
                    if ( $contarUsuario > 0) {
                        $men = '<p class="errors errors-activo">Este nombre de usuario ya existe <br> intenta con otro</p>';
                    } else if ($contarCorreo > 0) {
                        $men = '  <p class="errors errors-activo">Este correo ya existe, intenta con otro</p>';
                        
                    } else {

                        $men =  '<p class="msj_correcto">Te has registrado correctamente</p>';

                        $insertar = "INSERT INTO users_register(nombre, clave,correo)
                                    VALUES ('$nombre_user','$password_user','$correo_user')";
                        $ejecutarInsert = mysqli_query($conex, $insertar);
                    }
                } else {

                    $men =  '<p class="errors errors-activo">El correo solo puede contener <br> letras, numeros, puntos, guiones y guion bajo</p>';
                }
            } else {

                $men = '<p class="errors errors-activo">El nombre solo puede contener texto.</p>';
            }
        } else {

            $men = ' <p class="errors errors-activo">La contraseña tiene que ser <br> de 4 a 12 dígitos.</p>';
        }
    } else {

        $men = '<p class="errors errors-activo">El nombre tiene que ser de 4 a 16 dígitos.</p>';
    }
}
