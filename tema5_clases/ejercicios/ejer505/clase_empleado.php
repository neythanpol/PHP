<?php
    class Empleado {
        private string $nombre;
        private string $apellido;
        private float $sueldo;
        private array $telefono = [];

        private static float $sueldoTope = 1500.0;  // Variable estática

        // Constructor
        public function __construct(string $nom, string $ape, float $sue = 1000.0) {
            $this -> nombre = $nom;
            $this -> apellido = $ape;
            $this -> sueldo = $sue;
        }

        // Getters y setters
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

        public function getSueldo() : float {
            return $this -> sueldo;
        }

        // Getter y setter para sueldoTope (variable estática)
        public static function setSueldoTope(float $tope): void {
            self::$sueldoTope = $tope;
        }

        public static function getSueldoTope(): float {
            return self::$sueldoTope;
        }

        public function __toString() {
            // Convertir los teléfonos en una cadena separada por comas
            $telefonoStr = empty($this -> telefono) ? "Sin teléfonos" : implode(", ", $this -> telefono);
        
            return "Empleado: " . $this->nombre . " " . $this -> apellido . " " . $this -> sueldo . " Teléfonos: " . $telefonoStr;
        }

        public function getDatosCompletos() : string {
            // Convertir los teléfonos en una cadena separada por comas
            $telefonoStr = empty($this -> telefono) ? "Sin teléfonos" : implode(", ", $this -> telefono);
        
            return "Empleado: " . $this -> nombre . " " . $this -> apellido . " " . $this -> sueldo . " Teléfonos: " . $telefonoStr;
        }

        public function debePagarImpuestos() : bool {
            return $this -> sueldo > self::$sueldoTope;  // Se usa la variable estática
        }

        // Métodos relacionados con los teléfonos
        public function anadirTelefono(int $telefono) : void {
            $this -> telefono[] = $telefono;
        }

        public function listarTelefonos() : string {
            return implode(", ", $this -> telefono);
        }

        public function vaciarTelefonos() : void {
            $this -> telefono = [];
        }
    }
?>
