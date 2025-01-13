<?php
    class Empleado{
        private string $nombre;
        private string $apellidos;
        private float $sueldo;
        private array $telefonos;

        public function __construct(string $nombre, string $apellidos, float $sueldo, int $telefono){
            $this->setNombre($nombre);
            $this->setApellidos($apellidos);
            $this->setSueldo($sueldo);
            $this->anadirTelefono($telefono);
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

        public function getSueldo(): float{
            return $this->sueldo;
        }
        public function setSueldo(float $sueldo) {
            $this->sueldo = $sueldo;
        }

        public function anadirTelefono(int $telefono){
            $this->telefonos[] = $telefono;
        }
        public function listarTelefonos(){
            $telefonos = "";
            foreach($this->telefonos as $telefono){
                $telefonos .= $telefono . " ";
            }
            return $telefonos;
        }
        public function vaciarTelefonos(){
            $this->telefonos = [];
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