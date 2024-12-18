<?php
// DEECLARTACION DE  array:////////////////////////////////////////////////////////////////

$mi_array_vacio_corto = [];

// 2. Declarar un array numérico con valores de diferentes tipos de datos
$mi_array_numerico = array(1, "Hola", true, 3.14, null);

// Se pueden acceder a los elementos por su índice:
echo $mi_array_numerico[1]; // Salida: Hola

// 3. Declarar un array con posiciones vacías
$mi_array_con_posiciones_vacias = array(1, null, "Texto", null);

// Las posiciones 1 y 3 contienen valores nulos, pero las posiciones están definidas.





// Crear un array asociativo con nombres de estudiantes como claves y sus notas como valores
$estudiantes = [
    "Ana" => 8.5,
    "Juan" => 7.0,
    "Lucia" => 9.3,
    "Pedro" => 6.4
];

// Añadir un nuevo estudiante al array
$estudiantes["Marta"] = 8.7;

// Cambiar la nota de un estudiante existente (por ejemplo, modificar la nota de "Juan")
$estudiantes["Juan"] = 7.8;

// Eliminar un estudiante del array (por ejemplo, eliminar "Pedro")
unset($estudiantes["Pedro"]);

// Mostrar el array final para comprobar los cambios
print_r($estudiantes);








//////////////////////////////////////////////////////////////////////////////////////////////         ASOCIATIVOS
// 4. Declarar un array asociativo (clave => valor)
$mi_array_asociativo = array(
    "nombre" => "Juan",
    "edad" => 25,
    "ciudad" => "Madrid"
);
// Acceder a los valores por la clave:
echo $mi_array_asociativo['nombre']; // Salida: Juan

// 5. _______________________________________________________________________Declarar un array asociativo con claves enteras
$mi_array_asociativo_claves_enteras = array(
    1 => "Primero",
    2 => "Segundo",
    3 => "Tercero"
);
// Acceder por claves enteras:
echo $mi_array_asociativo_claves_enteras[2]; // Salida: Segundo


//////////////////////////////////////////////////////////////////////////////////////////////         BIDIMENSIONALES

$matriz_5x5 = array(
    array(0, 0, 0, 0, 0),
    array(0, 0, 0, 0, 0),
    array(0, 0, 0, 0, 0),
    array(0, 0, 0, 0, 0),
    array(0, 0, 0, 0, 0)
);

// 6. ____________________________________________________________________Declarar un array multidimensional (array dentro de otro array)
$mi_array_multidimensional = array(
    "frutas" => array("manzana", "naranja", "plátano"),
    "vehiculos" => array("coche", "moto", "bicicleta"),
    "edades" => array(20, 30, 40)
);


// Acceder a elementos del array multidimensional:
echo $mi_array_multidimensional['frutas'][1]; // Salida: naranja
echo $mi_array_multidimensional['edades'][2]; // Salida: 40

// 7. _________________________________________________________________________Declarar un array multidimensional asociativo
$mi_array_multidimensional_asociativo = array(
    "persona1" => array(
        "nombre" => "Carlos",
        "edad" => 30,
        "profesion" => "Ingeniero"
    ),
    "persona2" => array(
        "nombre" => "Ana",
        "edad" => 28,
        "profesion" => "Doctora"
    )
);
// Acceder a los datos dentro del array multidimensional asociativo:
echo $mi_array_multidimensional_asociativo['persona2']['nombre']; // Salida: Ana

// 8. ___________________________________________________________________________________Declarar un array con llaves mezcladas (asociativas y numéricas)
$mi_array_mezclado = array(
    0 => "Cero",
    "uno" => 1,
    2 => "Dos",
    "tres" => 3
);
// Acceder a los valores:
echo $mi_array_mezclado[2];    // Salida: Dos
echo $mi_array_mezclado['uno']; // Salida: 1



// 9. Añadir elementos a un array existente
$mi_array_numerico[] = "Nuevo valor"; // Agregar un valor al final del array numérico
$mi_array_asociativo["pais"] = "España"; // Agregar un nuevo par clave/valor al array asociativo

// 10. Declarar un array con varios tipos de datos y posiciones específicas vacías
$mi_array_varios_tipos = array(100, "Texto", null, false, 3.1416);

// Aquí la posición 2 tiene un valor `null` y la posición 3 un valor booleano.






// //////////////////////////////////// _____________________________________   MOVIDAS DE  array:

$arr1 = array(
    10 => "3000",
    20 => "4000",
    30 => "6000",
);
$arr2 = array(
    10 => "8000",
    15 => "6000",
    20 => "4000",
);

//Se concatenan los array, en casi de key iguales, tiene prioriadd al del primer array osea $arr1
$arr3 = $arr1 + $arr2;











//_________________________________________________________modificar array por referencia &          &


// Función que modifica todos los valores de un array
function modificarArray(&$arr) {
    foreach ($arr as &$valor) {
        $valor *= 2; // Multiplicamos cada valor por 2
    }
}

$numeros = [1, 2, 3, 4, 5];
echo "Antes de modificar: " . implode(", ", $numeros) . "\n";

modificarArray($numeros); // Pasamos el array por referencia

echo "Después de modificar: " . implode(", ", $numeros) . "\n";












/////////////////////////////////_________________________________ FUNCIONES ARRAYS


// 1. is_array(): Verifica si el argumento es un array
$frutas = array("manzana", "banana", "pera");

if (is_array($frutas)) {
    echo "Es un array.<br>";  // Salida: Es un array.
} else {
    echo "No es un array.<br>";
}


// count($ARRAY); //Devuelve el número de elementos en un array

$mi_array = array(1, 2, 3, 4);
echo "Número de elementos: " . count($mi_array); //DEVUELVE 4


// 2. array_merge(): Combina uno o más arrays
$array1 = array("a" => "manzana", "b" => "banana");
$array2 = array("a" => "pera", "d" => "uva");
$resultado = array_merge($array1, $array2);
print_r($resultado);  // Salida: Array ( [a] => pera [b] => banana [d] => uva )
echo "<br>";


// 3. in_array(): Comprueba si un valor existe en un array
$frutas = array("manzana", "banana", "pera");
echo in_array("pera", $frutas) ? "Encontrado" : "No encontrado";  // Salida: Encontrado
echo "<br>";


// 4. array_keys(): Devuelve todas las claves de un array
$asociativo = array("nombre" => "Juan", "edad" => 30, "ciudad" => "Madrid");
$claves = array_keys($asociativo);
print_r($claves);  // Salida: Array ( [0] => nombre [1] => edad [2] => ciudad )
echo "<br>";


// 5. array_values(): Devuelve todos los valores de un array
$valores = array_values($asociativo);
print_r($valores);  // Salida: Array ( [0] => Juan [1] => 30 [2] => Madrid )
echo "<br>";


// 6. array_unique(): Elimina valores duplicados de un array
$repetidos = array(1, 2, 2, 3, 4, 4, 5);
$unicos = array_unique($repetidos);
print_r($unicos);  // Salida: Array ( [0] => 1 [1] => 2 [3] => 3 [4] => 4 [6] => 5 )
echo "<br>";


// 7. array_reverse(): Invierte el orden de los elementos de un array
$reverso = array_reverse($mi_array);
print_r($reverso);  // Salida: Array ( [0] => 4 [1] => 3 [2] => 2 [3] => 1 )
echo "<br>";

//////////// invertir un array asociativo manualmente
// Array asociativo original
$arrayOriginal = [
    'manzana' => 'rojo',
    'plátano' => 'amarillo',
    'fresa' => 'rosado'
];

// Creamos un array vacío para almacenar el resultado
$arrayInvertido = [];

// Usamos un bucle foreach inverso para recorrer el array desde el último elemento
$keys = array_keys($arrayOriginal); // Obtenemos las claves del array original
$values = array_values($arrayOriginal); // Obtenemos los valores del array original

for ($i = count($keys) - 1; $i >= 0; $i--) {
    // Añadimos las claves y valores en orden inverso al nuevo array
    $arrayInvertido[$keys[$i]] = $values[$i];
}

// Imprimimos el resultado
print_r($arrayInvertido);






// 8. ________sort(): Ordena un array en orden ascendente
sort($mi_array);
print_r($mi_array);  // Salida: Array ( [0] => 1 [1] => 2 [2] => 3 [3] => 4 )
echo "<br>";


// 11. _________asort(): Ordena un array asociativopor valores  manteniendo las claves 
/*
Ordena por: Valores del array (no por las claves).
Orden alfabético: Si los valores son cadenas de texto, ordena alfabéticamente (basado en el orden ASCII).
Orden numérico: Si los valores son números, los ordena en orden ascendente.
Mixto (números y texto): Los valores numéricos se ordenan primero (ascendentemente) y luego los valores alfabéticos. */

asort($personas);
print_r($personas);  // Salida: Array ( [1] => 25 [ciudad] => Madrid [nombre] => Juan ) (ordena por valores)
echo "<br>";





// __________________________________________________________________________________ksort: Ordenar un array asociativo por claves en orden ascendente.
// Esta función reordena el array según las claves (alfabéticamente o numéricamente).
// Devuelve true si tiene éxito y false si falla.

/*
Ordena por: Claves del array (no por los valores).
Orden alfabético: Si las claves son cadenas de texto, se ordenan alfabéticamente (basado en el orden ASCII).
Orden numérico: Si las claves son números, se ordenan en orden ascendente.
Mixto (números y texto): Las claves numéricas se ordenan primero y luego las cadenas alfabéticamente. */

echo "Array original:\n";
print_r($array);

ksort($array); // Ordenamos el array por las claves.
echo "Array ordenado por claves (ksort):\n";
print_r($array);






// 9. ______________________________________________________________________________________________array_search(): Busca un valor en un array y devuelve la clave 
$clave = array_search("banana", $frutas);
echo "Clave de 'banana': " . $clave . "<br>";  // Salida: Clave de 'banana': 1


// 10. ________________________________________________________________________________________________array_push(): Agrega uno o más elementos al final de un array
array_push($frutas, "uva");
print_r($frutas);  // Salida: Array ( [0] => manzana [1] => banana [2] => pera [3] => uva )
echo "<br>";


// 11. _______________________________________________________________________________________________array_pop(): Elimina y devuelve el último valor del array
$ultimo = array_pop($frutas);
echo "El último valor era: " . $ultimo . "<br>";  // Salida: El último valor era: uva
print_r($frutas);  // Salida: Array ( [0] => manzana [1] => banana [2] => pera )


// 12. _______________________________________________________________________________________________implode(): Une los elementos de un array en una cadena
$frutas = array("manzana", "banana", "pera");

// Unir los elementos del array separados por comas
$cadenaFrutas = implode(', ', $frutas);
echo "Frutas unidas por comas: " . $cadenaFrutas . "<br>";  // Salida: Frutas unidas por comas: manzana, banana, pera

// Unir los elementos del array separados por espacios
$cadenaFrutasEspacios = implode(' ', $frutas);
echo "Frutas unidas por espacios: " . $cadenaFrutasEspacios . "<br>";  // Salida: Frutas unidas por espacios: manzana banana pera


// ______________________________________________________________________________________________ucwords(): Convierte la primera letra de cada palabra en mayúscula
$texto = "hola mundo";
// Convierte "hola mundo" en "Hola Mundo"
$resultado = ucwords($texto);
echo $resultado;  // Salida: "Hola Mundo"


// ____________________________________________________________________________________________strrev(): Invierte el orden de los caracteres en una cadena
$texto = "Hola";
// Invierte el texto "Hola", resultando en "aloH"
$resultado = strrev($texto);
echo $resultado;  // Salida: "aloH"

// _______________________________________________________________________________________str_repeat(): Repite una cadena el número de veces especificado
$texto = "Hola ";
// Repite "Hola " tres veces
$resultado = str_repeat($texto, 3);
echo $resultado;  // Salida: "Hola Hola Hola "


// ______________________________________________________________________verifica si una clave existe dentro de un array.
// Devuelve true si la clave existe y false si no.

$array = ['nombre' => 'Juan', 'edad' => 30, 'pais' => 'España'];
$key = 'edad';
if (array_key_exists($key, $array)) {
    echo "array_key_exists: La clave '$key' existe en el array.\n";
} else {
    echo "array_key_exists: La clave '$key' no existe en el array.\n";
}

array_key_exists("peras", $arrayAsociativo);



// ____________________________________________________________in_array  verifica si un valor existe dentro de un array
// Valor que queremos buscar en el array
$value = 'España';

// Devuelve true si el valor existe y false si no.
if (in_array($value, $array)) {
    // Si el valor existe, mostramos un mensaje indicando que está presente.
    echo "in_array: El valor '$value' existe en el array.\n";
} else {
    // Si el valor no existe, mostramos un mensaje indicando su ausencia.
    echo "in_array: El valor '$value' no existe en el array.\n";
}





//____________________________________________ array_search busca un valor dentro de un array y devuelve la clave asociada

// Valor que queremos buscar en el array, pero queremos saber también la clave asociada.
$searchValue = 'Juan';


// Si el valor no se encuentra, devuelve false.
$keyFound = array_search($searchValue, $array);
if ($keyFound !== false) {
    // Si el valor existe, mostramos un mensaje indicando la clave asociada al valor.
    echo "array_search: El valor '$searchValue' está asociado a la clave '$keyFound'.\n";
} else {
    // Si el valor no existe, mostramos un mensaje indicando su ausencia.
    echo "array_search: El valor '$searchValue' no se encuentra en el array.\n";
}





// 1. ______________________________________________________________________________max(): Devuelve el valor máximo de un array
$numeros = array(10, 20, 30, 40, 50);
$maximo = max($numeros);
echo "El valor máximo es: " . $maximo . "<br>";  // Salida: El valor máximo es: 50


// 2. ___________________________________________________________________________________print_r(): Muestra el contenido de un array en formato legible
$frutas = array("manzana", "pera", "banana");
print_r($frutas);  // Salida: Array ( [0] => manzana [1] => pera [2] => banana )
echo "<br>";


// 3.______________________________________________________________________________________ var_dump(): Muestra información detallada de un array o variable
var_dump($frutas);  // Muestra el tipo de dato y el valor de cada elemento del array
echo "<br>";


// 5_________________________________________________________________________________________ array_shift(): Elimina y devuelve el primer elemento del array
$primero = array_shift($frutas);
echo "El primer elemento eliminado es: " . $primero . "<br>";  // Salida: El primer elemento eliminado es: manzana
print_r($frutas);  // Salida: Array ( [0] => pera )
echo "<br>";


// 12. _______________________________________________________________________________________isset(): Verifica si un elemento está definido y tiene un valor devuelve true en casi de que si y false si no
echo isset($personas['nombre']) ? "La clave 'nombre' existe" : "La clave 'nombre' no existe";  // Salida: La clave 'nombre' existe
echo "<br>";


// 13. ________________________________________________________________________________________unset(): Elimina un elemento del array
unset($personas['ciudad']);
print_r($personas);  // Salida: Array ( [nombre] => Juan [edad] => 25 )
echo "<br>";


// 14. _____________________________________________________________________________array_slice(): Extrae una porción de un array
$numeros_grandes = array(100, 200, 300, 400, 500);
$porcion = array_slice($numeros_grandes, 1, 3);
print_r($porcion);  // Salida: Array ( [0] => 200 [1] => 300 [2] => 400 )
echo "<br>";


// 16. _____________________________________________________________________________________array_unshift(): Añade uno o más elementos al inicio de un array
array_unshift($frutas, "fresa", "melón");
print_r($frutas);  // Salida: Array ( [0] => fresa [1] => melón [2] => pera [3] => naranja )
echo "<br>";


// 17. ___________________________________________________________________________________array_map(): Aplica una función a todos los elementos de un array
$numeros_cuadrados = array_map(function($n) { return $n * $n; }, $numeros_grandes);
print_r($numeros_cuadrados);  // Salida: Array ( [0] => 10000 [1] => 40000 [2] => 90000 [3] => 160000 [4] => 250000 )
echo "<br>";

$arrayFrutas = [
    'manzana' => 'rojo',
    'plátano' => 'amarillo',
    'fresa' => 'rosado'
];

// Aquí, usamos array_map para crear un array invertido, donde las claves y valores están intercambiados.
$frutasInvertidas = array_map(
    function ($key, $value) {
        return [$value, $key]; // Por cada clave-valor, devolvemos un array donde el valor es la clave y la clave es el valor.
    },
    array_keys($arrayFrutas), // Extraemos las claves del array original.
    array_values($arrayFrutas) // Extraemos los valores del array original.
);

// Imprimimos el resultado
print_r($frutasInvertidas);




// 18. __________________________________________________________________________________array_filter(): Filtra los elementos de un array usando una función de callback
$numeros_filtrados = array_filter($numeros_grandes, function($n) { return $n > 300; });
print_r($numeros_filtrados);  // Salida: Array ( [3] => 400 [4] => 500 )
echo "<br>";

$arrayEmpleados = [
    'Juan' => 1000,
    'Maria' => 800,
    'Pedro' => 1200,
    'Ana' => 900
];
$sueldoMinimo = 950;
$empleadosConSueldosAlta = array_filter($arrayEmpleados, function ($value) use ($sueldoMinimo) {
    return $value > $sueldoMinimo;
});
print_r($empleadosConSueldosAlta);







// _______________________________________________________________________________________md5(): Crea un hash MD5 de una cadena
$password = "123456";
// Genera el hash MD5 de la contraseña "123456"
$hash = md5($password);
// Imprime el hash generado. Típicamente usado para almacenar contraseñas (aunque actualmente se recomienda usar algoritmos más seguros como bcrypt)
echo $hash;  // Salida: "e10adc3949ba59abbe56e057f20f883e" (puede variar)


/*___________________________________________________________________________________________preg_match() es una función en PHP que busca patrones en una cadena utilizando expresiones regulares. Devuelve:

1 si encuentra una coincidencia.
0 si no encuentra ninguna.
false si ocurre un error */

// Cadena simple
$texto = "Hola123";

// Verificar si el texto contiene solo letras (sin números ni caracteres especiales)
if (preg_match('/^[a-zA-Z]+$/', $texto)) {
    echo "El texto contiene solo letras.\n";
} else {
    echo "El texto tiene otros caracteres además de letras.\n";
}

// Explicación del patrón:
// '/^[a-zA-Z]+$/' -> Busca si el texto tiene solo letras mayúsculas o minúsculas (a-z, A-Z)
// ^ y $ -> indican el inicio y el final de la cadena, para que toda la cadena sea solo letras
// + -> indica que debe haber al menos una letra





/////////////////////////////////////////////////////////////////   REllenar array asociatico
////////////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////   REllenar array asociatico
////////////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////   REllenar array asociatico
////////////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////   REllenar array asociatico
////////////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////   REllenar array asociatico
////////////////////////////////////////////////////////////////////////////////////////////////////


// ____________1. Declarar un array asociativo vacío y añadir elementos individualmente (clave => valor)

/**
 * Declaración de un array asociativo vacío.
 */
$arrayAsociativo = [];

/**
 * Añadir elementos al array asociativo.
 * Puedes añadir elementos especificando la clave y el valor con la sintaxis `clave => valor`.
 */
$arrayAsociativo['nombre'] = "Juan";
$arrayAsociativo['edad'] = 25;
$arrayAsociativo['ciudad'] = "Madrid";

print_r($arrayAsociativo); 
// Salida:
// Array (
//     [nombre] => Juan
//     [edad] => 25
//     [ciudad] => Madrid
// )













// ____________2. Declarar un array asociativo vacío y añadir varios elementos de una sola vez

/**
 * Añadir varios elementos al array asociativo utilizando la sintaxis de asignación masiva.
 * Puedes definir múltiples elementos en una sola línea.
 */
$arrayAsociativo = [];

$arrayAsociativo += [
    'profesion' => "Ingeniero",
    'pais' => "España",
    'email' => "juan@example.com"
];

print_r($arrayAsociativo); 
// Salida:
// Array (
//     [profesion] => Ingeniero
//     [pais] => España
//     [email] => juan@example.com
// )









// ____________3. Usar `array_merge()` para rellenar un array asociativo con nuevas claves y valores

/**
 * Usar la función `array_merge()` para combinar elementos existentes con nuevos valores.
 * La función `array_merge()` permite combinar dos arrays asociativos.
 */
$arrayAsociativo = array_merge($arrayAsociativo, [
    'telefono' => "123456789",
    'direccion' => "Calle Falsa 123"
]);

print_r($arrayAsociativo); 
// Salida:
// Array (
//     [profesion] => Ingeniero
//     [pais] => España
//     [email] => juan@example.com
//     [telefono] => 123456789
//     [direccion] => Calle Falsa 123
// )










// ____________4. Usar un bucle para rellenar un array asociativo (manual o dinámico)

$arrayAsociativo = [];
$claves = ['nombre', 'edad', 'ciudad'];
$valores = ['Carlos', 30, 'Barcelona'];

/**
 * Rellenar un array asociativo mediante un bucle `for`.
 */
for ($i = 0; $i < count($claves); $i++) {
    $arrayAsociativo[$claves[$i]] = $valores[$i];
}

print_r($arrayAsociativo); 
// Salida:
// Array (
//     [nombre] => Carlos
//     [edad] => 30
//     [ciudad] => Barcelona
// )










// ____________5. Utilizar la función `array_fill_keys()` para rellenar un array asociativo con un valor predeterminado

/**
 * `array_fill_keys()` permite crear un array asociativo a partir de una lista de claves y asignarles un valor predeterminado.
 */
$claves = ['nombre', 'apellido', 'edad', 'email'];
$arrayAsociativo = array_fill_keys($claves, "pendiente");

print_r($arrayAsociativo); 
// Salida:
// Array (
//     [nombre] => pendiente
//     [apellido] => pendiente
//     [edad] => pendiente
//     [email] => pendiente
// )












// ____________6. Añadir claves y valores al array asociativo mediante un formulario (simulado)

$arrayAsociativo = [];

/**
 * Asumiendo que estos valores provienen de un formulario, se asignan de la siguiente manera.
 */
$arrayAsociativo['usuario'] = "María";
$arrayAsociativo['contraseña'] = "secreta123";
$arrayAsociativo['rol'] = "administrador";

print_r($arrayAsociativo); 
// Salida:
// Array (
//     [usuario] => María
//     [contraseña] => secreta123
//     [rol] => administrador
// )







// ____________7. Modificar los valores del array asociativo usando la clave existente

/**
 * Modificar el valor de una clave específica.
 * Basta con acceder al índice del array y asignarle un nuevo valor.
 */
$arrayAsociativo['nombre'] = "Javier";
$arrayAsociativo['edad'] = 40;

print_r($arrayAsociativo); 
// Salida:
// Array (
//     [usuario] => María
//     [contraseña] => secreta123
//     [rol] => administrador
//     [nombre] => Javier
//     [edad] => 40
// )









// ____________8. Usar `foreach` para añadir nuevas claves y valores a un array asociativo

/**
 * Usar un bucle `foreach` para añadir nuevas claves y valores a un array.
 * Utilizamos un bucle para recorrer un array de datos y añadirlos a nuestro array asociativo.
 */
$arrayAsociativo = [];
$datosNuevos = [
    'apellido' => 'Pérez',
    'direccion' => 'Calle Nueva 45',
    'telefono' => '987654321'
];

foreach ($datosNuevos as $clave => $valor) {
    $arrayAsociativo[$clave] = $valor;
}

print_r($arrayAsociativo); 
// Salida:
// Array (
//     [apellido] => Pérez
//     [direccion] => Calle Nueva 45
//     [telefono] => 987654321
// )











//convinar dor array para crear uno asociativo


// Forma 1: Usando array_combine()
// ======================================
// Dos arrays: uno para las claves y otro para los valores
$claves = ["clave1", "clave2", "clave3"];
$valores = ["valor1", "valor2", "valor3"];

// Creamos el array asociativo usando array_combine()
$array_asociativo_combine = array_combine($claves, $valores);

// Mostramos el resultado
echo "Forma 1: Usando array_combine()\n";
print_r($array_asociativo_combine);

echo "\n\n"; // Separador entre ejemplos







// Forma 2: Usando un bucle for
// ======================================
// Inicializamos un array vacío
$array_asociativo_for = [];

// Recorremos los arrays para emparejar las claves y valores
for ($i = 0; $i < min(count($claves), count($valores)); $i++) {
    $array_asociativo_for[$claves[$i]] = $valores[$i]; // Asignamos clave => valor
}

// Mostramos el resultado
echo "Forma 2: Usando un bucle for\n";
print_r($array_asociativo_for);

echo "\n\n"; // Separador entre ejemplos

// Forma 3: Validando Longitud de los Arrays
// ======================================
// Validamos si ambos arrays tienen la misma longitud
if (count($claves) === count($valores)) {
    $array_asociativo_validado = array_combine($claves, $valores); // Combinamos si son iguales
    echo "Forma 3: Validando longitud de los arrays\n";
    print_r($array_asociativo_validado);
} else {
    echo "Forma 3: Los arrays tienen longitudes diferentes.\n";
}

echo "\n\n"; // Separador entre ejemplos

// Forma 4: Usando un bucle foreach personalizado
// ======================================
// Creamos un array vacío para el resultado
$array_asociativo_foreach = [];

// Recorremos las claves y valores manualmente
foreach ($claves as $indice => $clave) {
    $array_asociativo_foreach[$clave] = $valores[$indice]; // Emparejamos clave => valor
}

// Mostramos el array resultante
echo "Forma 4: Usando un bucle foreach\n";
print_r($array_asociativo_foreach);
?>



?>


