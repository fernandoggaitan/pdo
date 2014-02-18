<?php if (!defined('CONTROLADOR')) exit; ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title> Guardar personaje </title>
    </head>
    <body>
        <h1> Guardar personaje </h1>
        <form method="post" action="guardar_personaje.php">
            <label for="nombre"> Nombre </label>
            <br />
            <input type="text" name="nombre" id="nombre" value="<?php echo $personaje->getNombre() ?>" required />
            <br />
            <label for="descripcion"> Descripción </label>
            <br />
            <input type="text" name="descripcion" id="descripcion" value="<?php echo $personaje->getDescripcion() ?>" required />
            <br />            
            <?php if ($personaje->getId()): ?>
                <input type="hidden" name="personaje_id" value="<?php echo $personaje->getId() ?>" />
            <?php endif; ?>
            <input type="submit" value="Guardar" />
            <a href="index.php"> Cancelar </a>
        </form>
    </body>
</html>