<?php
    
    define('CONTROLADOR', TRUE);
    
    require_once 'modelos/Personaje.php';
    
    $personajes = Personaje::recuperarTodos();
    
    require_once 'vistas/index.php';
    
?>