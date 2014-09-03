<?php

if (!defined('CONTROLADOR'))
    exit;

require_once 'Conexion.php';

class Personaje {

    private $id;
    private $nombre;
    private $descripcion;

    const TABLA = 'personaje';
    
    public function __construct($nombre=null, $descipcion=null, $id=null) {
        $this->nombre = $nombre;
        $this->descripcion = $descipcion; 
       $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function guardar() {
        $conexion = new Conexion();
        if ($this->id) /* Modifica */ {
            $consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET nombre = :nombre, descripcion = :descripcion WHERE id = :id');
            $consulta->bindParam(':nombre', $this->nombre);
            $consulta->bindParam(':descripcion', $this->descripcion);
            $consulta->bindParam(':id', $this->id);
            $consulta->execute();
        } else /* Inserta */ {
            $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA . ' (nombre, descripcion) VALUES(:nombre, :descripcion)');
            $consulta->bindParam(':nombre', $this->nombre);
            $consulta->bindParam(':descripcion', $this->descripcion);
            $consulta->execute();
            $this->id = $conexion->lastInsertId();
        }
        $conexion = null;
    }
    
    public function eliminar(){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE id = :id');
        $consulta->bindParam(':id', $this->id);
        $consulta->execute();
        $conexion = null;
    }

    public static function buscarPorId($id) {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT nombre, descripcion FROM ' . self::TABLA . ' WHERE id = :id');
        $consulta->bindParam(':id', $id);
        $consulta->execute();
        $registro = $consulta->fetch();
        $conexion = null;
        if ($registro) {
            return new self($registro['nombre'], $registro['descripcion'], $id);
        } else {
            return false;
        }
    }

    public static function recuperarTodos() {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT id, nombre, descripcion FROM ' . self::TABLA . ' ORDER BY nombre');
        $consulta->execute();
        $registros = $consulta->fetchAll();
        $conexion = null;
        return $registros;
    }

}
