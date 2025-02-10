<?php
    class Producto{
        private int $id;
        private string $nombre;
        private float $precio;
        private string $descripcion;
        private string $clase;
        private string $id_mono;

        public function __construct($id, $nombre, $precio, $descripcion, $clase, $id_mono)
        {
            $this->setID($id);
            $this->setNombre($nombre);
            $this->setPrecio($precio);
            $this->setDescripcion($descripcion);
            $this->setClase($clase);
            $this->setIDMono($id_mono);
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

        public function setDescripcion($descripcion){
            $this->descripcion = $descripcion;
        }
        public function getDescripcion() : string {
            return $this->descripcion;
        }

        public function setClase($clase){
            $this->clase = $clase;
        }
        public function getClase() : string {
            return $this->clase;
        }

        public function setIDMono($id_mono){
            $this->id_mono = $id_mono;
        }
        public function getIDMono() : string {
            return $this->id_mono;
        }

    }