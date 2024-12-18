<?php
// 21. __________________________________________________________________________________
// Ejercicio: Validar un formulario de registro de usuario.
// Enunciado: Escribe una función que valide un formulario con los campos: nombre, email, contraseña y edad.
// Requisitos:
// - El nombre debe contener solo letras y tener al menos 3 caracteres.
// - El email debe ser válido.
// - La contraseña debe tener al menos 8 caracteres, incluir al menos un número, una letra mayúscula y un carácter especial.
// - La edad debe ser un número entre 18 y 100.
// Si todos los datos son válidos, la función debe devolver un array con "status" => "success" y los datos.
// En caso contrario, devolver un array con "status" => "error" y un mensaje.

function validarFormulario($datos) {
    $errores = [];
    
    // Validar nombre
    if (!preg_match("/^[a-zA-Z ]{3,}$/", $datos['nombre'])) {
        $errores[] = "El nombre debe contener solo letras y al menos 3 caracteres.";
    }

    // Validar email
    if (!filter_var($datos['email'], FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El email no es válido.";
    }

    // Validar contraseña
    if (!preg_match("/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $datos['password'])) {
        $errores[] = "La contraseña debe tener al menos 8 caracteres, incluir un número, una mayúscula y un carácter especial.";
    }

    // Validar edad
    if ($datos['edad'] < 18 || $datos['edad'] > 100) {
        $errores[] = "La edad debe estar entre 18 y 100 años.";
    }

    // Retornar resultado
    if (empty($errores)) {
        return ["status" => "success", "datos" => $datos];
    } else {
        return ["status" => "error", "errores" => $errores];
    }
}

// Ejemplo de prueba
$formulario = [
    'nombre' => 'Juan Perez',
    'email' => 'juan@example.com',
    'password' => 'Password1!',
    'edad' => 25
];
print_r(validarFormulario($formulario));
echo "<br>";





// 22. __________________________________________________________________________________
// Ejercicio: Generar y validar un código de confirmación alfanumérico.
// Enunciado: Crea una función que genere un código de confirmación de 10 caracteres (letras y números).
// Además, escribe otra función que reciba un código y valide si cumple con los requisitos:
// - Longitud exacta de 10 caracteres.
// - Solo debe contener letras y números.

function generarCodigo() {
    $caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $codigo = '';
    for ($i = 0; $i < 10; $i++) {
        $codigo .= $caracteres[rand(0, strlen($caracteres) - 1)];
    }
    return $codigo;
}

function validarCodigo($codigo) {
    if (strlen($codigo) !== 10) {
        return "El código debe tener exactamente 10 caracteres.";
    }
    if (!preg_match("/^[a-zA-Z0-9]+$/", $codigo)) {
        return "El código solo puede contener letras y números.";
    }
    return "El código es válido.";
}

// Generar un código y validar
$codigo = generarCodigo();
echo "Código generado: $codigo<br>";
echo validarCodigo($codigo);
echo "<br>";





// 23. __________________________________________________________________________________
// Ejercicio: Analizar ventas por región y categoría.
// Enunciado: Dado un array asociativo con los datos de ventas por región y categoría de producto:
// - Calcula el total de ventas por región.
// - Calcula el total de ventas por categoría.
// - Identifica la región con más ventas y la categoría más vendida.

$ventas = [
    'Norte' => ['Electrónica' => 12000, 'Ropa' => 8000, 'Alimentos' => 10000],
    'Sur' => ['Electrónica' => 15000, 'Ropa' => 4000, 'Alimentos' => 7000],
    'Este' => ['Electrónica' => 9000, 'Ropa' => 11000, 'Alimentos' => 13000],
    'Oeste' => ['Electrónica' => 20000, 'Ropa' => 6000, 'Alimentos' => 5000]
];

// Calcular totales por región
$totalesRegion = [];
foreach ($ventas as $region => $categorias) {
    $totalesRegion[$region] = array_sum($categorias); // Suma las ventas de todas las categorías en la región
}

// Calcular totales por categoría
$totalesCategoria = [];
foreach ($ventas as $categorias) {
    foreach ($categorias as $categoria => $venta) {
        if (!isset($totalesCategoria[$categoria])) {
            $totalesCategoria[$categoria] = 0;
        }
        $totalesCategoria[$categoria] += $venta; // Suma las ventas de cada categoría
    }
}

// Encontrar región y categoría con más ventas
$regionMax = array_keys($totalesRegion, max($totalesRegion))[0];
$categoriaMax = array_keys($totalesCategoria, max($totalesCategoria))[0];

// Imprimir resultados
echo "Totales por región:<br>";
print_r($totalesRegion);
echo "<br>";

echo "Totales por categoría:<br>";
print_r($totalesCategoria);
echo "<br>";

echo "Región con más ventas: $regionMax<br>";
echo "Categoría más vendida: $categoriaMax<br>";



// 24. __________________________________________________________________________________
// Ejercicio: Gestionar un sistema de inventario.
// Enunciado: Crea un sistema que permita agregar, eliminar y consultar productos en un inventario.
// El inventario debe estar representado como un array asociativo donde:
// - La clave sea el nombre del producto.
// - El valor sea la cantidad disponible.
// Implementa funciones para:
// 1. Agregar un producto al inventario (si ya existe, aumenta la cantidad).
// 2. Eliminar un producto (si no existe, devuelve un mensaje de error).
// 3. Consultar la cantidad disponible de un producto.

$inventario = [];

// Función para agregar productos
function agregarProducto(&$inventario, $producto, $cantidad) {
    if (isset($inventario[$producto])) {
        $inventario[$producto] += $cantidad; // Si el producto ya existe, aumentamos la cantidad
    } else {
        $inventario[$producto] = $cantidad; // Si no existe, lo agregamos
    }
}

// Función para eliminar productos
function eliminarProducto(&$inventario, $producto) {
    if (isset($inventario[$producto])) {
        unset($inventario[$producto]); // Eliminamos el producto del inventario
        return "Producto '$producto' eliminado.";
    } else {
        return "El producto '$producto' no existe en el inventario.";
    }
}

// Función para consultar un producto
function consultarProducto($inventario, $producto) {
    if (isset($inventario[$producto])) {
        return "El producto '$producto' tiene una cantidad de: " . $inventario[$producto];
    } else {
        return "El producto '$producto' no existe en el inventario.";
    }
}

// Ejemplo de uso
agregarProducto($inventario, "manzanas", 50);
agregarProducto($inventario, "plátanos", 30);
agregarProducto($inventario, "manzanas", 20); // Aumentamos la cantidad de manzanas

echo consultarProducto($inventario, "manzanas");
echo "<br>";
echo eliminarProducto($inventario, "plátanos");
echo "<br>";
print_r($inventario);






// 25. __________________________________________________________________________________
// Ejercicio: Analizar datos de estudiantes en una clase.
// Enunciado: Crea un programa que reciba un array de estudiantes, donde cada estudiante es un array asociativo con:
// - Nombre del estudiante.
// - Notas (un array de números).
// Implementa funciones para:
// 1. Calcular la nota media de cada estudiante.
// 2. Determinar qué estudiante tiene la mejor nota media.
// 3. Listar todos los estudiantes con notas superiores a un umbral dado.

$estudiantes = [
    ["nombre" => "Juan", "notas" => [7, 8, 9]],
    ["nombre" => "Ana", "notas" => [10, 9, 9]],
    ["nombre" => "Carlos", "notas" => [6, 7, 8]]
];

// Función para calcular la nota media
function calcularMedia($notas) {
    return array_sum($notas) / count($notas);
}

// Función para encontrar el estudiante con la mejor nota media
function mejorEstudiante($estudiantes) {
    $mejor = null;
    $mejorMedia = 0;

    foreach ($estudiantes as $estudiante) {
        $media = calcularMedia($estudiante['notas']);
        if ($media > $mejorMedia) {
            $mejorMedia = $media;
            $mejor = $estudiante['nombre'];
        }
    }

    return "El mejor estudiante es $mejor con una media de $mejorMedia.";
}

// Función para listar estudiantes con notas superiores a un umbral
function estudiantesSuperiores($estudiantes, $umbral) {
    $resultados = [];
    foreach ($estudiantes as $estudiante) {
        $media = calcularMedia($estudiante['notas']);
        if ($media > $umbral) {
            $resultados[] = $estudiante['nombre'];
        }
    }
    return $resultados;
}

// Ejemplo de uso
echo mejorEstudiante($estudiantes);
echo "<br>";
print_r(estudiantesSuperiores($estudiantes, 8)); // Estudiantes con media superior a 8





// 26. __________________________________________________________________________________
// Ejercicio: Validar una tarjeta de crédito usando el algoritmo de Luhn.
// Enunciado: Implementa una función que valide un número de tarjeta de crédito usando el algoritmo de Luhn:
// 1. Dobla cada segundo dígito empezando desde la derecha.
// 2. Si el resultado de la multiplicación es mayor a 9, suma los dígitos.
// 3. Suma todos los dígitos (incluidos los que no se doblaron).
// 4. Si el total es divisible por 10, la tarjeta es válida.

function validarTarjetaLuhn($numeroTarjeta) {
    $numeros = array_reverse(str_split($numeroTarjeta)); // Revertimos y convertimos en array
    $suma = 0;

    foreach ($numeros as $posicion => $digito) {
        $digito = (int)$digito; // Convertimos a entero
        if ($posicion % 2 != 0) { // Doblamos cada segundo dígito
            $digito *= 2;
            if ($digito > 9) { // Si el resultado es mayor que 9, sumamos los dígitos
                $digito -= 9;
            }
        }
        $suma += $digito; // Sumamos los dígitos
    }

    return $suma % 10 === 0 ? "Tarjeta válida" : "Tarjeta no válida";
}

// Ejemplo de uso
echo validarTarjetaLuhn("4532015112830366");
echo "<br>";
echo validarTarjetaLuhn("1234567812345670");



// 27. __________________________________________________________________________________
// Ejercicio: Crear un sistema de gestión de tareas pendientes.
// Enunciado: Crea un programa que permita agregar, eliminar, y listar tareas pendientes. Cada tarea debe incluir:
// - Un ID único.
// - Una descripción.
// - Un estado (pendiente o completado).
// Implementa funciones para:
// 1. Agregar una nueva tarea.
// 2. Marcar una tarea como completada.
// 3. Eliminar una tarea.
// 4. Listar todas las tareas, indicando cuáles están pendientes y cuáles completadas.

$tareas = []; // Array para almacenar las tareas

// Función para agregar una tarea
function agregarTarea(&$tareas, $descripcion) {
    $id = count($tareas) + 1; // Generar ID único
    $tareas[$id] = ["descripcion" => $descripcion, "estado" => "pendiente"];
}

// Función para marcar una tarea como completada
function completarTarea(&$tareas, $id) {
    if (isset($tareas[$id])) {
        $tareas[$id]['estado'] = "completada";
    } else {
        echo "La tarea con ID $id no existe.<br>";
    }
}

// Función para eliminar una tarea
function eliminarTarea(&$tareas, $id) {
    if (isset($tareas[$id])) {
        unset($tareas[$id]); // Eliminar la tarea del array
    } else {
        echo "La tarea con ID $id no existe.<br>";
    }
}

// Función para listar todas las tareas
function listarTareas($tareas) {
    foreach ($tareas as $id => $tarea) {
        echo "ID: $id | Descripción: " . $tarea['descripcion'] . " | Estado: " . $tarea['estado'] . "<br>";
    }
}

// Ejemplo de uso
agregarTarea($tareas, "Estudiar PHP");
agregarTarea($tareas, "Hacer ejercicio");
completarTarea($tareas, 1); // Marcamos la primera tarea como completada
eliminarTarea($tareas, 2);  // Eliminamos la segunda tarea
listarTareas($tareas);
?>








<?php
// 28. __________________________________________________________________________________
// Ejercicio: Simular una tienda online.
// Enunciado: Crea un programa que simule una tienda online. El programa debe:
// - Permitir al usuario agregar productos a un carrito de compras.
// - Mostrar el total del carrito.
// - Eliminar productos del carrito.
// - Aplicar un descuento si el total supera los 100 euros.

$productosDisponibles = [
    "camiseta" => 20,
    "pantalones" => 50,
    "zapatillas" => 80,
    "gorra" => 15
];
$carrito = []; // Carrito de compras

// Función para agregar un producto al carrito
function agregarAlCarrito(&$carrito, $producto, $cantidad, $productosDisponibles) {
    if (isset($productosDisponibles[$producto])) {
        if (isset($carrito[$producto])) {
            $carrito[$producto] += $cantidad; // Si ya está en el carrito, aumentamos la cantidad
        } else {
            $carrito[$producto] = $cantidad; // Agregamos el producto con la cantidad
        }
    } else {
        echo "El producto '$producto' no está disponible.<br>";
    }
}

// Función para mostrar el total del carrito
function mostrarTotal($carrito, $productosDisponibles) {
    $total = 0;
    foreach ($carrito as $producto => $cantidad) {
        $total += $productosDisponibles[$producto] * $cantidad; // Calculamos el total
    }
    // Aplicar descuento si el total supera los 100
    if ($total > 100) {
        $total *= 0.9; // Aplicamos un 10% de descuento
        echo "Se ha aplicado un descuento del 10%.<br>";
    }
    return $total;
}

// Función para eliminar un producto del carrito
function eliminarDelCarrito(&$carrito, $producto) {
    if (isset($carrito[$producto])) {
        unset($carrito[$producto]); // Eliminamos el producto del carrito
    } else {
        echo "El producto '$producto' no está en el carrito.<br>";
    }
}

// Ejemplo de uso
agregarAlCarrito($carrito, "camiseta", 2, $productosDisponibles);
agregarAlCarrito($carrito, "zapatillas", 1, $productosDisponibles);
eliminarDelCarrito($carrito, "camiseta"); // Eliminamos las camisetas del carrito
$total = mostrarTotal($carrito, $productosDisponibles);
echo "Total del carrito: $total euros<br>";
?>








<?php
// 29. __________________________________________________________________________________
// Ejercicio: Crear un calendario mensual.
// Enunciado: Escribe un programa que genere un calendario para un mes dado. El calendario debe:
// - Mostrar los días del mes numerados.
// - Marcar los fines de semana en un color diferente.
// - Incluir el nombre del mes y el año.

function generarCalendario($mes, $anio) {
    $diasEnElMes = cal_days_in_month(CAL_GREGORIAN, $mes, $anio); // Obtiene el número de días del mes
    $primerDia = date("w", strtotime("$anio-$mes-01")); // Día de la semana del primer día (0 = domingo, 6 = sábado)

    echo "<h2>Calendario de $mes / $anio</h2>";
    echo "<table border='1' style='text-align: center;'>";
    echo "<tr>
        <th>Dom</th><th>Lun</th><th>Mar</th><th>Mié</th><th>Jue</th><th>Vie</th><th>Sáb</th>
    </tr><tr>";

    // Espacios en blanco para los días anteriores al primer día
    for ($i = 0; $i < $primerDia; $i++) {
        echo "<td></td>";
    }

    // Generar los días del mes
    for ($dia = 1; $dia <= $diasEnElMes; $dia++) {
        $diaDeLaSemana = ($primerDia + $dia - 1) % 7; // Calcula el día de la semana
        $color = ($diaDeLaSemana == 0 || $diaDeLaSemana == 6) ? "style='background-color: lightblue;'" : ""; // Fines de semana en azul
        echo "<td $color>$dia</td>";

        // Salto de línea después de sábado
        if ($diaDeLaSemana == 6) {
            echo "</tr><tr>";
        }
    }

    echo "</tr></table>";
}

// Ejemplo de uso
generarCalendario(11, 2024); // Calendario de noviembre de 2024
?>








<?php
// 30. __________________________________________________________________________________
// Ejercicio: Crear un juego de adivinar un número.
// Enunciado: Crea un programa donde el usuario tenga 5 intentos para adivinar un número aleatorio entre 1 y 100.
// - Después de cada intento, indica si el número es mayor o menor al número ingresado.
// - Si el usuario adivina el número, muestra un mensaje de felicitación y termina el juego.

function juegoAdivinaNumero() {
    $numeroSecreto = rand(1, 100); // Número aleatorio entre 1 y 100
    $intentos = 5;

    echo "¡Bienvenido al juego! Tienes $intentos intentos para adivinar el número.<br>";

    for ($i = 1; $i <= $intentos; $i++) {
        $guess = readline("Intento $i: Ingresa un número: "); // Solicita un número
        if ($guess == $numeroSecreto) {
            echo "¡Felicidades! Adivinaste el número secreto ($numeroSecreto) en el intento $i.<br>";
            return;
        } elseif ($guess < $numeroSecreto) {
            echo "El número es mayor que $guess.<br>";
        } else {
            echo "El número es menor que $guess.<br>";
        }
    }
    echo "Lo siento, no adivinaste. El número secreto era $numeroSecreto.<br>";
}

// Ejemplo de uso
juegoAdivinaNumero();

// 31. __________________________________________________________________________________
// Ejercicio: Contar palabras en una cadena y clasificarlas.
// Enunciado: Escribe una función que reciba un párrafo de texto y cuente cuántas veces aparece cada palabra. 
// La función debe devolver un array asociativo donde las claves sean las palabras y los valores las frecuencias de cada una.

function contarPalabras($texto) {
    $texto = strtolower($texto); // Convertimos el texto a minúsculas para evitar duplicados
    $texto = preg_replace("/[^\w\s]/", "", $texto); // Eliminamos signos de puntuación
    $palabras = explode(" ", $texto); // Dividimos el texto en palabras
    return array_count_values($palabras); // Contamos las frecuencias de cada palabra
}

// Ejemplo de uso
$parrafo = "PHP es un lenguaje de programación. PHP es muy poderoso.";
$resultado = contarPalabras($parrafo);
print_r($resultado);
?>
php
Copiar código
<?php
// 32. __________________________________________________________________________________
// Ejercicio: Generar un acrónimo a partir de una frase.
// Enunciado: Escribe una función que reciba una frase y devuelva un acrónimo formado por las iniciales de cada palabra. 
// El acrónimo debe estar en mayúsculas.

function generarAcronimo($frase) {
    $palabras = explode(" ", $frase); // Dividimos la frase en palabras
    $acronimo = "";
    foreach ($palabras as $palabra) {
        $acronimo .= strtoupper($palabra[0]); // Tomamos la primera letra de cada palabra y la convertimos a mayúscula
    }
    return $acronimo;
}

// Ejemplo de uso
$frase = "Hypertext Preprocessor";
echo "El acrónimo de '$frase' es: " . generarAcronimo($frase);
?>
php
Copiar código
<?php
// 33. __________________________________________________________________________________
// Ejercicio: Invertir las palabras de una frase manteniendo el orden.
// Enunciado: Escribe una función que reciba una frase y devuelva la misma frase, pero con las palabras invertidas letra por letra. 
// El orden de las palabras debe mantenerse.

function invertirPalabras($frase) {
    $palabras = explode(" ", $frase); // Dividimos la frase en palabras
    foreach ($palabras as &$palabra) {
        $palabra = strrev($palabra); // Invertimos cada palabra
    }
    return implode(" ", $palabras); // Unimos las palabras invertidas en una nueva frase
}

// Ejemplo de uso
$frase = "Hola mundo desde PHP";
echo "Frase invertida: " . invertirPalabras($frase);
?>
php
Copiar código
<?php
// 34. __________________________________________________________________________________
// Ejercicio: Encontrar la palabra más larga en una cadena.
// Enunciado: Escribe una función que reciba una cadena de texto y devuelva la palabra más larga. 
// En caso de haber varias palabras con la misma longitud, devuelve la primera que aparezca.

function palabraMasLarga($texto) {
    $palabras = explode(" ", $texto); // Dividimos el texto en palabras
    $masLarga = "";
    foreach ($palabras as $palabra) {
        if (strlen($palabra) > strlen($masLarga)) {
            $masLarga = $palabra; // Actualizamos si encontramos una palabra más larga
        }
    }
    return $masLarga;
}

// Ejemplo de uso
$texto = "El desarrollo web en PHP es fascinante y desafiante";
echo "La palabra más larga es: " . palabraMasLarga($texto);
?>
php
Copiar código
<?php
// 35. __________________________________________________________________________________
// Ejercicio: Reemplazar palabras específicas en una cadena.
// Enunciado: Escribe una función que reciba una cadena y un array asociativo donde las claves sean palabras a buscar 
// y los valores sean sus reemplazos. La función debe devolver la cadena con las palabras reemplazadas.

function reemplazarPalabras($texto, $reemplazos) {
    foreach ($reemplazos as $buscar => $reemplazar) {
        $texto = str_replace($buscar, $reemplazar, $texto); // Reemplazamos cada palabra
    }
    return $texto;
}

// Ejemplo de uso
$texto = "PHP es poderoso y PHP es rápido.";
$reemplazos = ["PHP" => "Python", "poderoso" => "versátil"];
echo reemplazarPalabras($texto, $reemplazos);
?>
php
Copiar código
<?php
// 36. __________________________________________________________________________________
// Ejercicio: Contar vocales y consonantes en una cadena.
// Enunciado: Escribe una función que reciba una cadena y devuelva un array asociativo con el número de vocales y consonantes.

function contarVocalesConsonantes($texto) {
    $vocales = preg_match_all("/[aeiou]/i", $texto); // Contamos las vocales
    $consonantes = preg_match_all("/[bcdfghjklmnpqrstvwxyz]/i", $texto); // Contamos las consonantes
    return ["vocales" => $vocales, "consonantes" => $consonantes];
}

// Ejemplo de uso
$texto = "Hola mundo desde PHP";
$resultado = contarVocalesConsonantes($texto);
print_r($resultado);
?>
php
Copiar código
<?php
// 37. __________________________________________________________________________________
// Ejercicio: Agrupar palabras por longitud.
// Enunciado: Escribe una función que reciba una cadena y devuelva un array asociativo donde las claves sean longitudes 
// de palabras y los valores arrays de palabras que tengan esa longitud.

function agruparPorLongitud($texto) {
    $palabras = explode(" ", $texto); // Dividimos el texto en palabras
    $resultado = [];
    foreach ($palabras as $palabra) {
        $longitud = strlen($palabra); // Calculamos la longitud de la palabra
        $resultado[$longitud][] = $palabra; // Agrupamos por longitud
    }
    return $resultado;
}

// Ejemplo de uso
$texto = "PHP es increíblemente divertido";
$resultado = agruparPorLongitud($texto);
print_r($resultado);
?>
php
Copiar código
<?php
// 38. __________________________________________________________________________________
// Ejercicio: Crear un diccionario de palabras y definiciones.
// Enunciado: Escribe una función que reciba un array asociativo donde las claves sean palabras y los valores sus definiciones. 
// Permite consultar definiciones y agregar nuevas palabras.

$diccionario = [
    "PHP" => "Un lenguaje de programación popular para el desarrollo web.",
    "JavaScript" => "Un lenguaje de programación para desarrollo en el navegador.",
    "HTML" => "Un lenguaje de marcado para estructurar páginas web."
];

// Función para consultar una definición
function consultarDefinicion($diccionario, $palabra) {
    return $diccionario[$palabra] ?? "Definición no encontrada.";
}

// Función para agregar una nueva palabra
function agregarPalabra(&$diccionario, $palabra, $definicion) {
    $diccionario[$palabra] = $definicion; // Agregamos la nueva palabra y definición
}

// Ejemplo de uso
echo consultarDefinicion($diccionario, "PHP");
echo "<br>";
agregarPalabra($diccionario, "CSS", "Un lenguaje de estilos para diseñar páginas web.");
print_r($diccionario);
?>
php
Copiar código
<?php
// 39. __________________________________________________________________________________
// Ejercicio: Validar si una frase contiene una palabra prohibida.
// Enunciado: Escribe una función que reciba una frase y un array de palabras prohibidas. 
// La función debe devolver un mensaje indicando si contiene alguna de esas palabras.

function contienePalabrasProhibidas($frase, $prohibidas) {
    foreach ($prohibidas as $prohibida) {
        if (stripos($frase, $prohibida) !== false) { // stripos busca sin distinguir mayúsculas
            return "La frase contiene una palabra prohibida: $prohibida";
        }
    }
    return "La frase es válida.";
}

// Ejemplo de uso
$frase = "Este es un ejemplo de contenido inapropiado.";
$prohibidas = ["inapropiado", "prohibido"];
echo contienePalabrasProhibidas($frase, $prohibidas);
?>
php
Copiar código
<?php
// 40. __________________________________________________________________________________
// Ejercicio: Convertir texto a formato tipo título.
// Enunciado: Escribe una función que reciba una cadena y devuelva la misma cadena con cada palabra empezando con mayúscula.

function convertirTitulo($texto) {
    return ucwords($texto); // ucwords convierte la primera letra de cada palabra a mayúscula
}

// Ejemplo de uso
$texto = "este es un ejemplo de texto";
echo convertirTitulo($texto);
?>


<?php
// 41. __________________________________________________________________________________
// Ejercicio: Ordenar palabras alfabéticamente en una cadena.
// Enunciado: Escribe una función que reciba una cadena y devuelva las palabras ordenadas alfabéticamente.

function ordenarPalabras($texto) {
    $palabras = explode(" ", $texto); // Dividimos el texto en palabras
    sort($palabras); // Ordenamos alfabéticamente las palabras
    return implode(" ", $palabras); // Unimos las palabras ordenadas
}

// Ejemplo de uso
$texto = "PHP es un lenguaje de programación poderoso";
echo ordenarPalabras($texto);
?>
php
Copiar código
<?php
// 42. __________________________________________________________________________________
// Ejercicio: Reemplazar palabras repetidas por su frecuencia.
// Enunciado: Escribe una función que reciba una cadena y reemplace cada palabra repetida por su frecuencia entre paréntesis.

function reemplazarPorFrecuencia($texto) {
    $palabras = explode(" ", strtolower($texto)); // Convertimos el texto a minúsculas y lo dividimos en palabras
    $frecuencias = array_count_values($palabras); // Contamos la frecuencia de cada palabra
    foreach ($palabras as &$palabra) {
        if ($frecuencias[$palabra] > 1) {
            $palabra = $palabra . "(" . $frecuencias[$palabra] . ")"; // Reemplazamos con la frecuencia
        }
    }
    return implode(" ", $palabras);
}

// Ejemplo de uso
$texto = "PHP es un lenguaje PHP es poderoso";
echo reemplazarPorFrecuencia($texto);
?>
php
Copiar código
<?php
// 43. __________________________________________________________________________________
// Ejercicio: Calcular la longitud promedio de palabras.
// Enunciado: Escribe una función que reciba una cadena y calcule la longitud promedio de las palabras.

function longitudPromedio($texto) {
    $palabras = explode(" ", $texto); // Dividimos el texto en palabras
    $longitudTotal = array_sum(array_map("strlen", $palabras)); // Sumamos las longitudes de las palabras
    return $longitudTotal / count($palabras); // Calculamos el promedio
}

// Ejemplo de uso
$texto = "Este es un texto de ejemplo";
echo "Longitud promedio: " . longitudPromedio($texto);
?>
php
Copiar código
<?php
// 44. __________________________________________________________________________________
// Ejercicio: Crear un índice de palabras únicas en un texto.
// Enunciado: Escribe una función que reciba un texto y devuelva un array asociativo donde las claves sean palabras únicas 
// y los valores sean arrays con las posiciones donde aparecen.

function indicePalabras($texto) {
    $palabras = explode(" ", strtolower($texto)); // Convertimos el texto a minúsculas y lo dividimos en palabras
    $indice = [];
    foreach ($palabras as $posicion => $palabra) {
        if (!isset($indice[$palabra])) {
            $indice[$palabra] = [];
        }
        $indice[$palabra][] = $posicion + 1; // Guardamos la posición (1-indexada)
    }
    return $indice;
}

// Ejemplo de uso
$texto = "PHP es poderoso y PHP es popular";
print_r(indicePalabras($texto));
?>
php
Copiar código
<?php
// 45. __________________________________________________________________________________
// Ejercicio: Validar que una cadena sea un anagrama de otra.
// Enunciado: Escribe una función que reciba dos cadenas y determine si son anagramas (contienen las mismas letras en diferente orden).

function esAnagrama($cadena1, $cadena2) {
    $cadena1 = str_replace(" ", "", strtolower($cadena1)); // Eliminamos espacios y convertimos a minúsculas
    $cadena2 = str_replace(" ", "", strtolower($cadena2));
    return count_chars($cadena1, 1) === count_chars($cadena2, 1); // Comparamos las frecuencias de caracteres
}

// Ejemplo de uso
echo esAnagrama("roma", "amor") ? "Son anagramas" : "No son anagramas";
echo "<br>";
echo esAnagrama("PHP", "HTML") ? "Son anagramas" : "No son anagramas";
?>
php
Copiar código
<?php
// 46. __________________________________________________________________________________
// Ejercicio: Transformar un texto alternando mayúsculas y minúsculas.
// Enunciado: Escribe una función que reciba un texto y lo transforme alternando mayúsculas y minúsculas en cada carácter.

function alternarMayusMinus($texto) {
    $resultado = "";
    $alternar = true;
    foreach (str_split($texto) as $caracter) {
        if (ctype_alpha($caracter)) { // Solo alternamos letras
            $resultado .= $alternar ? strtoupper($caracter) : strtolower($caracter);
            $alternar = !$alternar; // Cambiamos el estado
        } else {
            $resultado .= $caracter; // Dejamos otros caracteres sin cambios
        }
    }
    return $resultado;
}

// Ejemplo de uso
$texto = "PHP es increíble";
echo alternarMayusMinus($texto);
?>
php
Copiar código
<?php
// 47. __________________________________________________________________________________
// Ejercicio: Crear un array asociativo con el conteo de palabras y su longitud.
// Enunciado: Escribe una función que reciba un texto y devuelva un array asociativo donde las claves sean palabras únicas 
// y los valores sean arrays con la frecuencia y la longitud de cada palabra.

function palabrasConLongitud($texto) {
    $palabras = explode(" ", strtolower($texto)); // Convertimos el texto a minúsculas y lo dividimos
    $frecuencias = array_count_values($palabras); // Contamos las frecuencias
    $resultado = [];
    foreach ($frecuencias as $palabra => $frecuencia) {
        $resultado[$palabra] = [
            "frecuencia" => $frecuencia,
            "longitud" => strlen($palabra)
        ];
    }
    return $resultado;
}

// Ejemplo de uso
$texto = "PHP es increíblemente poderoso y poderoso";
print_r(palabrasConLongitud($texto));
?>
php
Copiar código
<?php
// 48. __________________________________________________________________________________
// Ejercicio: Encontrar y resaltar palabras específicas en un texto.
// Enunciado: Escribe una función que reciba un texto y un array de palabras a resaltar. 
// Devuelve el texto con las palabras resaltadas entre asteriscos.

function resaltarPalabras($texto, $palabrasResaltar) {
    foreach ($palabrasResaltar as $palabra) {
        $texto = str_ireplace($palabra, "*$palabra*", $texto); // Reemplazamos ignorando mayúsculas/minúsculas
    }
    return $texto;
}

// Ejemplo de uso
$texto = "PHP es poderoso y muy popular";
$palabras = ["PHP", "popular"];
echo resaltarPalabras($texto, $palabras);
?>
php
Copiar código
<?php
// 49. __________________________________________________________________________________
// Ejercicio: Dividir un texto en frases y ordenarlas por longitud.
// Enunciado: Escribe una función que reciba un texto, lo divida en frases (separadas por puntos) 
// y devuelva las frases ordenadas por longitud.

function ordenarFrasesPorLongitud($texto) {
    $frases = array_filter(explode(".", $texto), "strlen"); // Dividimos por puntos y eliminamos frases vacías
    usort($frases, function($a, $b) {
        return strlen($a) - strlen($b); // Ordenamos por longitud
    });
    return $frases;
}

// Ejemplo de uso
$texto = "PHP es un lenguaje poderoso. Es muy popular. Facilita el desarrollo web.";
print_r(ordenarFrasesPorLongitud($texto));
?>
php
Copiar código
<?php
// 50. __________________________________________________________________________________
// Ejercicio: Verificar si una cadena contiene todas las letras del abecedario.
// Enunciado: Escribe una función que determine si una cadena es un pangrama (contiene todas las letras del alfabeto al menos una vez).

function esPangrama($texto) {
    $texto = strtolower(preg_replace("/[^a-z]/", "", $texto)); // Eliminamos caracteres no alfabéticos
    $letras = count_chars($texto, 1); // Contamos las frecuencias de cada letra
    return count($letras) === 26; // Verificamos si hay 26 letras distintas
}

// Ejemplo de uso
$texto1 = "El veloz murciélago hindú comía feliz cardillo y kiwi.";
$texto2 = "Esta frase no contiene todas las letras.";
echo esPangrama($texto1) ? "Es un pangrama" : "No es un pangrama";
echo "<br>";
echo esPangrama($texto2) ? "Es un pangrama" : "No es un pangrama";
?>