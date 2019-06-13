<?php

function mostrarError($errores, $campo){
    $alerta = '';
    if (isset($errores[$campo]) && !empty($campo)) {
        $alerta = "<div class='alerta alerta-error'>".$errores[$campo]."</div>";
    }
    return $alerta;
}

function borrarErrores(){
    $borrado = false;

    if (isset($_SESSION['errores'])) {
    $_SESSION['errores'] = NULL;
    $borrado = true;
    }

    if (isset($_SESSION['errores_entrada'])) {
    $_SESSION['errores_entrada'] = NULL;
    $borrado = true;
    }

    if (isset($_SESSION['completado'])) {
    $_SESSION['completado'] = NULL;
    $borrado = true;
    }
    return $borrado;
}

function conseguirCategorias($conexion){
    $sql = "SELECT * FROM categorias ORDER BY id ASC";
    $categorias = mysqli_query($conexion, $sql);

    $resultado = array();
    if ($categorias && mysqli_num_rows($categorias) >= 1) {
        $resultado = $categorias;
    }

    return $resultado;
    
}

function conseguirEntradas($conexion, $limit = null){
    $sql ="SELECT e.*, c.nombre AS 'categoria' FROM entradas e ". 
          "INNER JOIN categorias c ON e.categoria_id = c.id ".
          "ORDER BY e.id DESC";

    if($limit){
        //sql = sql." LIMIT 4"
        $sql .= "LIMIT 4";
    }


        $entradas = mysqli_query($conexion, $sql);
    
        $resultado = array();
        if($entradas && mysqli_num_rows($entradas) >=1){
            $resultado = $entradas;
        }
        return $entradas;
    }

?>