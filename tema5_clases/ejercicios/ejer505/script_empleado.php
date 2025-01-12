<?php
// Incluye la clase Empleado (si está en otro archivo, usa include o require)
include_once 'clase_empleado.php';

// Crear instancias de la clase Empleado
$empleado1 = new Empleado("Juan", "Pérez", 1200.0);
$empleado2 = new Empleado("Ana", "Gómez", 1800.0);

// Mostrar los datos de los empleados
echo $empleado1 . "\n";
echo $empleado2 . "\n";

// Comprobar si los empleados deben pagar impuestos
echo $empleado1->getNombre() . " debe pagar impuestos: " . ($empleado1->debePagarImpuestos() ? "Sí" : "No") . "\n";
echo $empleado2->getNombre() . " debe pagar impuestos: " . ($empleado2->debePagarImpuestos() ? "Sí" : "No") . "\n";

// Cambiar el sueldoTope estático
Empleado::setSueldoTope(1500.0);

// Comprobar nuevamente si los empleados deben pagar impuestos después de cambiar el sueldoTope
echo "Después de modificar el sueldoTope:\n";
echo $empleado1->getNombre() . " debe pagar impuestos: " . ($empleado1->debePagarImpuestos() ? "Sí" : "No") . "\n";
echo $empleado2->getNombre() . " debe pagar impuestos: " . ($empleado2->debePagarImpuestos() ? "Sí" : "No") . "\n";

// Cambiar el sueldo de un empleado
$empleado1->setSueldo(1600.0);

// Mostrar los datos del empleado1 con el sueldo actualizado
echo "\nDatos del empleado1 actualizado:\n";
echo $empleado1 . "\n";

// Listar teléfonos
$empleado1->anadirTelefono(123456789);
$empleado1->anadirTelefono(987654321);
echo $empleado1->getNombre() . " tiene los siguientes teléfonos: " . $empleado1->listarTelefonos() . "\n";

// Vaciar los teléfonos
$empleado1->vaciarTelefonos();
echo $empleado1->getNombre() . " tiene los siguientes teléfonos después de vaciar: " . $empleado1->listarTelefonos() . "\n";
?>
