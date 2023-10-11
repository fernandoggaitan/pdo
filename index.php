<?php
    
    define('CONTROLADOR', TRUE);
    
    require_once 'modelos/Personaje.php';
    
    $personajes = Personaje::recuperarTodos();

    //Modifico algo para probar.
    require_once 'vistas/index.php';
    
?>
