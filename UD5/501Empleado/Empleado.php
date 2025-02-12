<?php
    class Empleado{
        private string $nombre;
        private string $apellidos;
        private float $sueldo;

        public function __construct(string $nombre, string $apellidos, float $sueldo){
            $this->setNombre($nombre);
            $this->setApellidos($apellidos);
            $this->setSueldo($sueldo);
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
        public function setApellidos($apellidos) {
            $this->apellidos = $apellidos;
        }

        public function getSueldo(): float{
            return $this->sueldo;
        }
        public function setSueldo($sueldo) {
            $this->sueldo = $sueldo;
        }

        public function getDatosCompleto(){
            return $this->nombre . " " . $this->apellidos . ", sueldo: " . $this->sueldo;
        }

        public function debePagarImpuestos(): bool {
            if($this->sueldo > 1500){
                return true;
            } else {
                return false;
            }
        }
    }