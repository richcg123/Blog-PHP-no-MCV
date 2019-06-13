<?php

// RECOGER LOS DATOS POR EL METODO POST DEL FORMULARIO DE REGISTRO
if (isset($_POST)) {

    // conexion a la base de datos
    require_once 'includes/conexion.php';

    // inciar sesion
    if(isset($_SESSION)){
        session_start();
    }

    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false; // operador ternario
    $apellidos = isset($_POST['apellidos']) ?mysqli_real_escape_string($db, $_POST['apellidos']) : false; // si existe apellidos el valor de la variable tomara como $_POST['apellidos'] y si no llega tomara valor de false
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
    $password = isset($_POST['password']) ? mysqli_real_escape_string($db, $_POST['password']) : false;

    //Array de errores
    $errores = array(); 

    // Validar los datos antes de guardarlos en la base de datos
    // validar campo nombre
    if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) { 
        $nombre_validado = true;
    }else{
        $nombre_validado = false;
        $errores['nombre'] = "El nombre no es valido";
    }

    // validar campo apellidos
    if (!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)) { 
        $apellidos_validado = true;
    }else{
        $apellidos_validado = false;
        $errores['apellidos'] = "Los apellidos no son validos";
    }

    // validar campo email
    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) { 
        $email_validado = true;
    }else{
        $email_validado = false;
        $errores['email'] = "El email no es validos";
    }

    // validar campo password
    if (!empty($password)) { 
        $password_validado = true;
    }else{
        $password_validado = false;
        $errores['password'] = "añade una password";
    }

    $guardar_usuario = false;
    if (count($errores) == 0) {
        $guardar_usuario = true;

        //cifrar la contraseña
        $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);

        //insertar usuario en la tabla usuarios de la base de datos
        $sql = "INSERT INTO usuarios VALUE(null, '$nombre', '$apellidos', '$email', '$password_segura', CURDATE());";
        $guardar = mysqli_query($db, $sql);
        
        if ($guardar) {
            $_SESSION['completado'] = "El registro se ha completado con exito";
        }else {
            $_SESSION['errores']['general'] = "Fallo al guardar el usuario";
        }

    }else {
        $_SESSION['errores'] = $errores;
    }
}

header('location: index.php');

?>