<?php if (!defined('CONTROLADOR')) exit; ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title> Listar personajes </title>
    </head>
    <body>
        <h1> Personajes </h1>
        <p> <a href="guardar_personaje.php"> Crear nuevo personaje </a> </p>
        <?php if (count($personajes) > 0): ?>
            <ul>
                <?php foreach ($personajes as $item): ?>
                <li> 
                    <p> <?php echo $item['nombre'] . ' - ' . $item['descripcion']; ?>  </p>
                    <p> 
                        <a href="guardar_personaje.php?personaje_id=<?php echo $item['id'] ?>"> Editar </a> 
                        |
                        <a href="eliminar_personaje.php?personaje_id=<?php echo $item['id'] ?>"> Eliminar </a> 
                    </p>
                </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p> No hay personajes para mostrar </p>
        <?php endif; ?>
    </body>
</html>