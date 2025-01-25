<?php
class Producto {
    private $id;
    private $nombre;
    private $precio;
    private $descripcion;
    private $imagen;

    public function __construct($id, $nombre, $precio, $descripcion, $imagen) {
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> precio = $precio;
        $this -> descripcion = $descripcion;
        $this -> imagen = $imagen;
    }

    public function getId() {
        return $this -> id;
    }

    public function getNombre() {
        return $this -> nombre;
    }

    public function getPrecio() {
        return $this -> precio;
    }

    public function getDescripcion() {
        return $this -> descripcion;
    }

    public function getImagen() {
        return $this -> imagen;
    }
}
?>