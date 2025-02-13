<?php
//Clase Libro
class Libro{
    private int $id;
    private string $nombre;
    private float $precio;
    private int $cantidad;
    public function __construct($id, $nombre, $precio, $cantidad)
    {
        $this->setID($id);
        $this->setNombre($nombre);
        $this->setPrecio($precio);
        $this->setCantidad($cantidad);
    }
    public function setID($id){
        $this->id = $id;
    }

    public function getID()
    {
        return $this->id;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of precio
     */ 
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set the value of precio
     *
     * @return  self
     */ 
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get the value of cantidad
     */ 
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set the value of cantidad
     *
     * @return  self
     */ 
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }
}
?>
