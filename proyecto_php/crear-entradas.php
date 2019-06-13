<?php require_once 'includes/redireccion.php' ?>
<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/lateral.php'; ?>

<!-- Contenido principal -->
<div id="principal">
    <h1>Crear Entradas</h1>
    <p>
        Añade nuevas entradas al blog para que los usuarios puedan leerlas y disfrutar de nuestro contenido
    </p>
    <br>
    <form action="guardar-entradas.php" method="POST">
        <label for="titulo">Titulo: </label>
        <input type="text" name="titulo">
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'titulo') : ''; ?> <!-- mostrar error -->
        
        <label for="descripcion">Descripcion: </label>
        <textarea name="descripcion" cols="30" rows="10"></textarea>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'descripcion') : ''; ?> <!-- mostrar error -->

        <label for="categoria">Categoria</label>
        <select name="categoria">
            <?php $categorias = conseguirCategorias($db);
                if(!empty($categorias)):
                    while($categoria = mysqli_fetch_assoc($categorias)):
            ?>
                <option value="<?=$categoria['id']?>">
                    <?=$categoria['nombre']?>
                </option>
            <?php
                    endwhile;
                endif; 
            ?>
        </select>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'categoria') : ''; ?> <!-- mostrar error -->

        <input type="submit" value="Guardar">
    </form>
     <?php borrarErrores(); ?>

</div> <!-- FIN PRINCIPAL -->
<?php require_once 'includes/pie.php'; ?>