<?php
    class Empleado {
        private string $nombre;
        private string $apellido;
        private float $sueldo;
        private array $telefono = [];

        // Constructor
        public function __construct(string $nom, string $ape, float $sue) {
            $this -> nombre = $nom;
            $this -> apellido = $ape;
            $this -> sueldo = $sue;
        }

        //Getters y setters
        public function setNombre(string $nom) {
            $this -> nombre = $nom;
        }

        public function setApellido(string $ape) {
            $this -> apellido = $ape;
        }

        public function setSueldo(float $sue) {
            $this -> sueldo = $sue;
        }

        public function getNombre() : string {
            return $this -> nombre;
        }

        public function getApellido() : string {
            return $this -> apellido;
        }

        public function getSueldo() : string {
            return $this -> sueldo;
        }

        public function __toString() {
            return "Empleado: " . $this -> nombre . " " . $this -> apellido . " " . $this -> sueldo . " " . $this -> telefono;
        }

        public function getDatosCompletos() : string {
            return "Empleado: " . $this -> nombre . " " . $this -> apellido . " " . $this -> sueldo . " " . $this -> telefono;
        }

        public function debePagarImpuestos() : bool {
            return $this -> sueldo > 1500;
        }

        // Métodos relacionados con los teléfonos
        // Método para añadir un teléfono
        public function anadirTelefono(int $telefono) : void {
            $this -> telefono[] = $telefono;
        }

        // Método para listar los teléfonos
        public function listarTelefonos() : string {
            return implode(", ", $this -> telefono);
        }

        // Método para vaciar los teléfonos
        public function vaciarTelefonos() : void {
            $this -> telefono = [];
        }
    }
?>