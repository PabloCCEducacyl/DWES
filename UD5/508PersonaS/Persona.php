<?php

    class Persona {
        private string $nombre;
        private string $apellidos;

        public function __construct($nombre, $apellidos,){
            $this->setNombre($nombre);
            $this->setApellidos($apellidos);
        }

        public function __toString(){    
            return "nombre: {$this->nombre}, apellidos: {$this->apellidos}";
        }

        public function getNombre(): string{
            return $this->nombre;
        }
        public function setNombre(string $nombre){
            $this->nombre = $nombre;
        }
        
        public function getApellidos(): string{
            return $this->apellidos;
        }
        public function setApellidos(string $apellidos) {
            $this->apellidos = $apellidos;
        }
    }