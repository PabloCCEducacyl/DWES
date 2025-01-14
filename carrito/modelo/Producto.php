<?php
    class Producto{
        private int $id;
        private string $nombre;
        private float $precio;

        public function __construct($nombre, $precio)
        {
            $this->setNombre($nombre);
            $this->setPrecio($precio);
        }

        public function setID($id){
            $this->id = $id;
        }
        public function getID() : int {
            return $this->id;
        }

        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }
        public function getNombre() : string {
            return $this->nombre;
        }

        public function setPrecio($precio){
            $this->precio = $precio;
        }
        public function getPrecio() : float {
            return $this->precio;
        }
    }