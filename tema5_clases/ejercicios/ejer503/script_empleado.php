<?php
include_once 'clase_empleado.php';

// Crear empleados con y sin especificar el sueldo
$empleado1 = new Empleado("Ana", "Pérez", 2000);
$empleado2 = new Empleado("Luis", "Gómez");

// Mostrar información de los empleados
echo $empleado1 -> getDatosCompletos() . "<br>"; // Debería mostrar: "Empleado: Ana Pérez 2000"
echo $empleado2 -> getDatosCompletos() . "<br>"; // Debería mostrar: "Empleado: Luis Gómez 1000"
?>