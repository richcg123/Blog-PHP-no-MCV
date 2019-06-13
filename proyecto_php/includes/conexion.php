<?php
    $servidor = 'localhost';
    $usuario = 'root';
    $password = '';
    $database = 'blog_master';
    $db = mysqli_connect($servidor, $usuario, $password, $database);

    mysqli_query($db, "SET_NAMES 'utf8'");

    // Iniciar la sesion 
    if(!isset($_SESSION)){
        session_start();
        }

?>