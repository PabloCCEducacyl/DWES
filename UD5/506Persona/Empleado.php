<?php
    require_once "506Persona.php";
    var_dump(file_exists("506Persona.php"));
    class Empleado extends Persona{
        private static int $sueldoTope = 1500;

        private float $sueldo;
        private array $telefonos;

        public function __construct(string $nombre, string $apellidos, float $sueldo = 1000, ){
            parent::__construct($nombre, $apellidos);
            $this->setSueldo($sueldo);
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

        public function setSueldoTope(float $sueldo){
            Empleado::$sueldoTope = $sueldo;
        }


        public function getDatosCompleto(){
            return $this->nombre . " " . $this->apellidos . ", sueldo: " . $this->sueldo;
        }

        public function debePagarImpuestos(): bool {
            if($this->sueldo > Empleado::$sueldoTope){
                return true;
            } else {
                return false;
            }
        }
    }