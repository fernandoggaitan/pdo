<?php
    
    define('CONTROLADOR', TRUE);
    
    require_once 'modelos/Personaje.php';
    
    $personaje_id = (isset($_REQUEST['personaje_id'])) ? $_REQUEST['personaje_id'] : null;
    
    if($personaje_id){        
        $personaje = Personaje::buscarPorId($personaje_id);        
    }else{
        $personaje = new Personaje();
    }
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : null;
        $descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : null;
        $personaje->setNombre($nombre);
        $personaje->setDescripcion($descripcion);
        $personaje->guardar();
        header('Location: index.php');
    }else{
        include 'vistas/guardar_personaje.php';
    }
    
?>
