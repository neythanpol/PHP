<?php






// 1. Bucle WHILE
echo "Bucle WHILE:<br>";
$contador = 1;

while ($contador <= 5) {
    echo "Contador: " . $contador . "<br>";
    $contador++;
}
// Explicación: El bucle while ejecuta el código mientras la condición ($contador <= 5) sea verdadera.

echo "<br>";














// 2. Bucle FOR
echo "Bucle FOR:<br>";

for ($i = 1; $i <= 5; $i++) {
    echo "Iteración: " . $i . "<br>";
}
// Explicación: El bucle for tiene tres partes: 
// 1) Inicialización ($i = 1)
// 2) Condición ($i <= 5)
// 3) Incremento ($i++)

echo "<br>";















// 3. Bucle DO WHILE
echo "Bucle DO WHILE:<br>";
$numero = 1;
do {
    echo "Número: " . $numero . "<br>";
    $numero++;
} while ($numero <= 5);
// Explicación: El bucle do...while ejecuta el código al menos una vez, 
// ya que la condición se evalúa después de ejecutar el bloque de código.

echo "<br>";










// 4. Estructura SWITCH
echo "Estructura SWITCH:<br>";
$dia = "Lunes";

switch ($dia) {
    case "Lunes":
        echo "Hoy es Lunes<br>";
        break;
    case "Martes":
        echo "Hoy es Martes<br>";
        break;
    case "Miércoles":
        echo "Hoy es Miércoles<br>";
        break;
    case "Jueves":
        echo "Hoy es Jueves<br>";
        break;
    case "Viernes":
        echo "Hoy es Viernes<br>";
        break;
    default:
        echo "Es fin de semana<br>";
}
// Explicación: El switch evalúa la variable $dia y ejecuta el caso que coincida.
// Si no hay coincidencia, se ejecuta el bloque `default`.
?>