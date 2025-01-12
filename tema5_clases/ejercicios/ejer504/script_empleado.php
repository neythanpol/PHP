<?php
include_once 'clase_empleado.php';

// Crear empleados con diferentes sueldos
$empleado1 = new Empleado("Ana", "Pérez", 2000);
$empleado2 = new Empleado("Luis", "Gómez", 1400);

// Comprobar si deben pagar impuestos
echo $empleado1 -> getDatosCompletos() . "<br>";
echo $empleado1 -> debePagarImpuestos() ? "Debe pagar impuestos<br>" : "No debe pagar impuestos<br>";

echo $empleado2 -> getDatosCompletos() . "<br>";
echo $empleado2 -> debePagarImpuestos() ? "Debe pagar impuestos<br>" : "No debe pagar impuestos<br>";
?>
