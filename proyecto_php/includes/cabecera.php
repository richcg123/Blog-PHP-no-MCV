
<?php require_once 'conexion.php'; ?>
<?php require_once 'includes/helpers.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog de video juegos</title>

    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
</head>
<body>
    <!-- CABECERA -->

    <header id="cabecera">
        <div id="logo">
            <a href="index.php">
             Blog de VideoJuegos
            </a>
        </div>
    

    <!-- MENU -->
        <nav id="nav">
            <ul>
                <li>
                <a href="index.php">Inicio</a>
                </li>
                <li>
                    <?php
                        $categorias = conseguirCategorias($db);
                        if(!empty($categorias)):
                            while ($categoria = mysqli_fetch_assoc($categorias)): 
                     ?>
                            <li>
                                    <a href="categoria.php?id=<?=$categoria['id']?>"><?=$categoria['nombre']?></a>
                            </li>
                    <?php
                            endwhile;
                        endif;  
                    ?>
                </li>
                <li>
                <a href="index.php">Sobre mi</a>
                </li>
                <li>
                <a href="index.php">Contacto</a>
                </li>
            </ul>
        </nav>
                <div class="clearfix"></div> <!--borrar flotados -->
    </header>

    <div id="container">