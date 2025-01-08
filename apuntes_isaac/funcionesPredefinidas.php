<?php
// 1. Cadenas (Strings)

// 1.1 Manipulación de cadenas


// strlen: Devuelve la longitud de una cadena. |||||||||
$cadena = "Hola, mundo";
echo "strlen: " . strlen($cadena) . "\n"; // Salida: 11


// substr(): Devuelve un caracter o caracteres desde una cadena original.
$cadena = "Hola, mundo";
echo "substr: " . substr($cadena, 0, 4) . "\n"; // Salida: Hola substr(cadena, posición_inicial, longitud);




// str_replace: Reemplaza caracteres en una cadena.
echo "str_replace: " . str_replace("mundo", "PHP", $cadena) . "\n"; // Salida: Hola, PHP




// strtolower y strtoupper: Convierte una cadena a minúsculas o mayúsculas.
echo "strtolower: " . strtolower($cadena) . "\n"; // Salida: hola, mundo
echo "strtoupper: " . strtoupper($cadena) . "\n"; // Salida: HOLA, MUNDO



// ucwords(): Convierte a mayúscula la primera letra de cada palabra de una cadena.
$cadena = "hola mundo desde php";
echo "ucwords: " . ucwords($cadena) . "\n"; // Salida: Hola Mundo Desde Php




// strrev(): Invierte una cadena.
$cadena = "Hola";
echo "strrev: " . strrev($cadena) . "\n"; // Salida: aloH




// str_repeat(): Repite una cadena un número específico de veces.
$cadena = "Hola ";
echo "str_repeat: " . str_repeat($cadena, 3) . "\n"; // Salida: Hola Hola Hola 


// md5(): Calcula el hash MD5 de una cadena.
$cadena = "claveSecreta";
echo "md5: " . md5($cadena) . "\n"; // Salida: bdc87b9c894da5168059e00ebffb9077



// ucfirst(): Convierte la primera letra de una cadena en mayúscula.
// Esta función toma una cadena y devuelve la misma cadena con su primer carácter en mayúscula.
// Si el primer carácter ya es mayúscula, no se realizan cambios.
$cadena = "hola mundo";
echo "ucfirst: " . ucfirst($cadena) . "\n"; // Salida: Hola mundo

$cadena = "php es genial";
echo "ucfirst: " . ucfirst($cadena) . "\n"; // Salida: Php es genial


// lcfirst(): Convierte la primera letra de una cadena en minúscula.
// Esta función toma una cadena y devuelve la misma cadena con su primer carácter en minúscula.
// Si el primer carácter ya es minúscula, no se realizan cambios.
$cadena = "Hola Mundo";
echo "lcfirst: " . lcfirst($cadena) . "\n"; // Salida: hola Mundo

$cadena = "PHP es genial";
echo "lcfirst: " . lcfirst($cadena) . "\n"; // Salida: pHP es genial


// Convertimos la primera letra a mayúscula y el resto a minúsculas

$cadena = "HOLA MUNDO";
$resultado = ucfirst(strtolower($cadena));
echo "$resultad"; //Hola mundo




// str_split(): Divide una cadena en un array de subcadenas.
// Cada subcadena puede ser de longitud 1 (cada carácter) o de una longitud específica.
// Ejemplo con longitud 1:
$cadena = "Hola, mundo";
$arrayLetras = str_split($cadena);
print_r($arrayLetras); 
// Salida: Array ( [0] => H [1] => o [2] => l [3] => a [4] => , [5] => [6] => m [7] => u [8] => n [9] => d [10] => o )

// Ejemplo con longitud personalizada (3):
$arrayFragmentos = str_split($cadena, 3);
print_r($arrayFragmentos); 
// Salida: Array ( [0] => Hol [1] => a, [2] =>  mu [3] => ndo )

// Uso: str_split(cadena, longitud);

// trim(): Elimina espacios en blanco al inicio y al final de una cadena.
$cadenaEspaciada = "   Hola, mundo   ";
echo "trim: '" . trim($cadenaEspaciada) . "'\n"; // Salida: 'Hola, mundo'









// 1.2 Comparación de cadenas


// strcmp: Compara dos cadenas. Devuelve 0 si son iguales, <0 si la primera es menor y >0 si es mayor.
$cadena1 = "abc";
$cadena2 = "abd";
echo "strcmp: " . strcmp($cadena1, $cadena2) . "\n"; // Salida: -1 (abc < abd)


// strcasecmp: Compara sin distinguir entre mayúsculas y minúsculas.
echo "strcasecmp: " . strcasecmp("ABC", "abc") . "\n"; // Salida: 0


// strncmp: Compara los primeros N caracteres de dos cadenas.
echo "strncmp: " . strncmp("abcdef", "abcxyz", 3) . "\n"; // Salida: 0 (porque los primeros 3 caracteres coinciden)





// 1.3 Búsqueda en cadenas


// strpos: Busca la primera aparición de una subcadena.
echo "strpos: " . strpos($cadena, "mundo") . "\n"; // Salida: 6


// strrpos: Busca la última aparición de una subcadena.
echo "strrpos: " . strrpos($cadena, "o") . "\n"; // Salida: 10


// strstr: Devuelve la subcadena desde donde encuentra la primera aparición.
echo "strstr: " . strstr($cadena, "mundo") . "\n"; // Salida: mundo





// 1.4 Eliminación de espacios


// __________trim: Elimina los espacios en blanco al inicio y al final de una cadena.
$cadena_espacios = "  Hola, mundo  ";
echo "trim: '" . trim($cadena_espacios) . "'\n"; // Salida: 'Hola, mundo'


// _______________ltrim: Elimina los espacios en blanco al inicio de la cadena.
echo "ltrim: '" . ltrim($cadena_espacios) . "'\n"; // Salida: 'Hola, mundo  '


//____________________ rtrim: Elimina los espacios en blanco al final de la cadena.
echo "rtrim: '" . rtrim($cadena_espacios) . "'\n"; // Salida: '  Hola, mundo'







// __1.5 Manipulación de subcadenas


//_________________ explode(): Divide una cadena en un array usando un separador.
$lista = "manzana,platano,naranja";
$array_frutas = explode(",", $lista);
echo "explode: ";
print_r($array_frutas); // Salida: Array ( [0] => manzana [1] => platano [2] => naranja )



// __________________implode(): Convierte un array en una cadena usando un separador que elijas.
echo "implode: " . implode(" - ", $array_frutas) . "\n"; // Salida: manzana - platano - naranja



//___________________chr() genera letras
$letra = ($minMay == "min" ) ? $letra=chr(rand(97, 122)) : $letra=chr(rand(65, 90)) ;








// 1.6 Codificación y HTML


// htmlentities: Convierte caracteres especiales a entidades HTML.
$cadena_html = "<a href='test'>Enlace</a>";
echo "htmlentities: " . htmlentities($cadena_html) . "\n"; // Salida: &lt;a href=&#039;test&#039;&gt;Enlace&lt;/a&gt;


// htmlspecialchars: Convierte solo los caracteres especiales como &, <, >.
echo "htmlspecialchars: " . htmlspecialchars($cadena_html) . "\n"; // Salida: <a href='test'>Enlace</a>












/// Manejo de datos numericos 

// _______1. intval(): Convierte una variable a un valor entero.
// Esta función se utiliza para obtener la parte entera de una variable.
// Si la variable es un número decimal o un string numérico, devuelve su parte entera.
$valor = "15.75";
echo "intval: " . intval($valor) . "\n"; // Salida: 15






// ________2. abs(): Devuelve el valor absoluto de un número.
// Esta función toma un valor numérico y devuelve su valor sin signo, eliminando el negativo si lo tiene.
$numero = -25;
echo "abs: " . abs($numero) . "\n"; // Salida: 25






// _______3. round(): Redondea un número al entero más cercano.
// Se puede especificar la cantidad de decimales a redondear.
// Si no se especifican decimales, se redondea al número entero más cercano.
$numero = 12.3456;
echo "round: " . round($numero, 2) . "\n"; // Salida: 12.35






// ______4. ceil(): Redondea un número hacia arriba al siguiente entero.
// No importa el valor decimal, siempre lo redondea hacia el siguiente entero mayor.
$numero = 7.01;
echo "ceil: " . ceil($numero) . "\n"; // Salida: 8






// _____5. floor(): Redondea un número hacia abajo al entero menor.
// Similar a ceil, pero siempre redondea hacia abajo sin importar los decimales.
$numero = 9.99;
echo "floor: " . floor($numero) . "\n"; // Salida: 9






// ____6. rand(): Genera un número aleatorio entre dos valores.
// Esta función se utiliza para obtener un valor aleatorio en un rango específico.
// Se puede especificar un rango de números como límites.
$aleatorio = rand(1, 100);
echo "rand: " . $aleatorio . "\n"; // Salida: (un número entre 1 y 100)






// _____7. is_int(): Verifica si una variable es de tipo entero.
// Esta función verifica si el valor ingresado es un entero.
// Devuelve true si lo es, y false si no lo es.
$numero = 42;
echo "is_int: " . (is_int($numero) ? "Verdadero" : "Falso") . "\n"; // Salida: Verdadero






// __8. is_numeric(): Comprueba si una variable es numérica.
// Puede ser un número o un string numérico, pero devuelve true en ambos casos.
// Devuelve false si no se puede interpretar como número.
$numero = "42";
echo "is_numeric: " . (is_numeric($numero) ? "Verdadero" : "Falso") . "\n"; // Salida: Verdadero






// ___9. max(): Devuelve el valor máximo entre dos o más valores.
// Esta función compara un conjunto de valores y devuelve el mayor.
$maximo = max(10, 20, 30, 40);
echo "max: " . $maximo . "\n"; // Salida: 40






// ______10. min(): Devuelve el valor mínimo entre dos o más valores.
// Similar a max(), pero devuelve el valor más pequeño.
$minimo = min(5, 10, 15, 3);
echo "min: " . $minimo . "\n"; // Salida: 3






// ______11. pow(): Calcula la potencia de un número.
// Toma dos argumentos: base y exponente.
// Devuelve la base elevada a la potencia del exponente.
echo "pow: " . pow(2, 3) . "\n"; // Salida: 8






// _12. sqrt(): Calcula la raíz cuadrada de un número.
// Devuelve la raíz cuadrada de un número positivo.
// Si el valor es negativo, devuelve NaN.
echo "sqrt: " . sqrt(25) . "\n"; // Salida: 5






// ____13. decbin(): Convierte un entero decimal a binario.
// Toma un número entero y devuelve su representación en binario.
$numero = 10;
echo "decbin: " . decbin($numero) . "\n"; // Salida: 1010






// ______14. dechex(): Convierte un entero decimal a hexadecimal.
// Similar a decbin(), pero convierte a la base 16 en lugar de binario.
$numero = 255;
echo "dechex: " . dechex($numero) . "\n"; // Salida: ff






// ______15. decoct(): Convierte un entero decimal a octal.
// Devuelve la representación en base 8 de un número entero dado.
$numero = 15;
echo "decoct: " . decoct($numero) . "\n"; // Salida: 17






// ____16. hexdec(): Convierte un valor hexadecimal a decimal.
// Toma un valor hexadecimal (string) y devuelve su equivalente en decimal.
$hexadecimal = "a";
echo "hexdec: " . hexdec($hexadecimal) . "\n"; // Salida: 10






// _____17. bindec(): Convierte un valor binario a decimal.
// Similar a hexdec(), pero trabaja con números binarios en lugar de hexadecimales.
$binario = "1010";
echo "bindec: " . bindec($binario) . "\n"; // Salida: 10






// _________18. base_convert(): Convierte un número entre distintas bases numéricas.
// Toma un valor, su base de entrada y la base de salida.
// En este caso, convierte de decimal a hexadecimal.
echo "base_convert: " . base_convert("255", 10, 16) . "\n"; // Salida: ff






// __________19. gmp_abs(): Calcula el valor absoluto utilizando la extensión GMP para números grandes.
// Funciona igual que abs(), pero soporta valores muy grandes.
$numero_grande = gmp_init("-12345678901234567890");
echo "gmp_abs: " . gmp_strval(gmp_abs($numero_grande)) . "\n"; // Salida: 12345678901234567890






// _________20. gmp_add(): Realiza la suma de números grandes con GMP.
// Al igual que gmp_abs(), soporta enteros de gran tamaño.
// Devuelve el resultado de sumar los dos números.
$a = gmp_init("12345678901234567890");
$b = gmp_init("98765432109876543210");
$suma = gmp_add($a, $b);
echo "gmp_add: " . gmp_strval($suma) . "\n"; // Salida: 111111111011111111100











// 2. Tipos de datos


// ____floatval: Convierte una variable a float.
echo "floatval: " . floatval("12.34") . "\n"; // Salida: 12.34


// ____intval: Convierte una variable a entero.
echo "intval: " . intval("12.34") . "\n"; // Salida: 12


// _______strval: Convierte una variable a cadena.
echo "strval: " . strval(12345) . "\n"; // Salida: '12345'








// 3. Fechas

// ______________________date: Muestra la fecha actual en un formato específico.
echo "date: " . date("Y-m-d H:i:s") . "\n"; // Salida: 2024-10-18 12:34:56


// _______idate: Muestra una parte de la fecha (año, mes, etc.) como entero.
echo "idate (año actual): " . idate("Y") . "\n"; // Salida: 2024


// ______localtime: Devuelve un array con información de la fecha/hora local.
$localtime = localtime(time(), true);
echo "localtime: ";
print_r($localtime); // Salida: Array con segundos, minutos, horas, etc.


// ______getdate: Devuelve un array con información detallada de la fecha.
$fecha = getdate();
echo "getdate: ";
print_r($fecha); // Salida: Array con detalles de la fecha


// _____Formateo de fechas con date()
echo "Día de la semana: " . date("l") . "\n"; // Salida: Friday (día de la semana)
echo "Mes: " . date("F") . "\n"; // Salida: October (nombre del mes)









// 1. _____________________is_array(): Verifica si el argumento es un array
$frutas = array("manzana", "banana", "pera");

if (is_array($frutas)) {
    echo "Es un array.<br>";  // Salida: Es un array.
} else {
    echo "No es un array.<br>";
}


// 2. ______count(): Devuelve el número de elementos en un array
$numeroFrutas = count($frutas);
echo "El array contiene " . $numeroFrutas . " elementos.<br>";  // Salida: El array contiene 3 elementos.


// 3. is_string(): Verifica si el argumento es una cadena de texto
$mensaje = "Hola Mundo";

if (is_string($mensaje)) {
    echo "Es un string.<br>";  // Salida: Es un string.
} else {
    echo "No es un string.<br>";
}


// 4. _________strlen(): Devuelve la longitud de una cadena en caracteres
$longitudMensaje = strlen($mensaje);
echo "El string contiene " . $longitudMensaje . " caracteres.<br>";  // Salida: El string contiene 10 caracteres.
















//_____________mopdificar variable por referencia
function modificarVariable(&$var) {
    $var = 100; // Cambiamos el valor de la variable
}

$num = 10;
echo "Antes de modificar: $num\n";

modificarVariable($num); // Pasamos $num por referencia

echo "Después de modificar: $num\n";





///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////






// _________________________1. Cadenas (Strings)

// 1.1 Manipulación de cadenas

// ____________strlen: Devuelve la longitud de una cadena.
$cadena = "Hola, mundo";
echo "strlen: " . strlen($cadena) . "\n"; // Salida: 11

// Otro ejemplo con una cadena diferente
$cadena = "¡PHP es genial!";
echo "strlen: " . strlen($cadena) . "\n"; // Salida: 14




// ____________substr(): Devuelve un caracter o caracteres desde una cadena original.
$cadena = "Hola, mundo";
echo "substr: " . substr($cadena, 0, 4) . "\n"; // Salida: Hola (del índice 0 al 4)






// Otro ejemplo extrayendo una parte diferente de la cadena
echo "substr: " . substr($cadena, 7, 5) . "\n"; // Salida: mundo (del índice 7 con longitud 5)




// ____________str_replace: Reemplaza caracteres en una cadena.
echo "str_replace: " . str_replace("mundo", "PHP", $cadena) . "\n"; // Salida: Hola, PHP

// Otro ejemplo reemplazando otra parte
echo "str_replace: " . str_replace("Hola", "Adiós", $cadena) . "\n"; // Salida: Adiós, mundo

// _________________strtolower y strtoupper: Convierte una cadena a minúsculas o mayúsculas.
echo "strtolower: " . strtolower($cadena) . "\n"; // Salida: hola, mundo
echo "strtoupper: " . strtoupper($cadena) . "\n"; // Salida: HOLA, MUNDO

// Otro ejemplo con cadena distinta
$cadena2 = "Mi nombre es PHP";
echo "strtolower: " . strtolower($cadena2) . "\n"; // Salida: mi nombre es php
echo "strtoupper: " . strtoupper($cadena2) . "\n"; // Salida: MI NOMBRE ES PHP

// ___________________ ucwords(): Convierte a mayúscula la primera letra de cada palabra de una cadena.
$cadena = "hola mundo desde php";
echo "ucwords: " . ucwords($cadena) . "\n"; // Salida: Hola Mundo Desde Php

// Otro ejemplo
$cadena3 = "bienvenidos a php";
echo "ucwords: " . ucwords($cadena3) . "\n"; // Salida: Bienvenidos A Php

// _____________________ strrev(): Invierte una cadena.
$cadena = "Hola";
echo "strrev: " . strrev($cadena) . "\n"; // Salida: aloH

// Otro ejemplo con una cadena más larga
$cadena4 = "PHP es interesante";
echo "strrev: " . strrev($cadena4) . "\n"; // Salida: etnaretni se PHP

// ___________________ str_repeat(): Repite una cadena un número específico de veces.
$cadena = "Hola ";
echo "str_repeat: " . str_repeat($cadena, 3) . "\n"; // Salida: Hola Hola Hola 

// Otro ejemplo con una cadena diferente
$cadena5 = "PHP ";
echo "str_repeat: " . str_repeat($cadena5, 5) . "\n"; // Salida: PHP PHP PHP PHP PHP 

// ___________________ md5(): Calcula el hash MD5 de una cadena.
$cadena = "claveSecreta";
echo "md5: " . md5($cadena) . "\n"; // Salida: bdc87b9c894da5168059e00ebffb9077

// Otro ejemplo para una cadena diferente
$cadena6 = "OtraClave";
echo "md5: " . md5($cadena6) . "\n"; // Salida: diferente hash MD5

//________________________ 1.2 Comparación de cadenas

// ___________________strcmp: Compara dos cadenas. Devuelve 0 si son iguales, <0 si la primera es menor y >0 si es mayor.
$cadena1 = "abc";
$cadena2 = "abd";
echo "strcmp: " . strcmp($cadena1, $cadena2) . "\n"; // Salida: -1 (abc < abd)

// Otro ejemplo donde ambas cadenas son iguales
$cadena3 = "hola";
$cadena4 = "hola";
echo "strcmp: " . strcmp($cadena3, $cadena4) . "\n"; // Salida: 0

// ___________strcasecmp: Compara sin distinguir entre mayúsculas y minúsculas.
echo "strcasecmp: " . strcasecmp("ABC", "abc") . "\n"; // Salida: 0

// Otro ejemplo con cadenas diferentes
echo "strcasecmp: " . strcasecmp("PHP", "php") . "\n"; // Salida: 0

//_________ strncmp: Compara los primeros N caracteres de dos cadenas.
echo "strncmp: " . strncmp("abcdef", "abcxyz", 3) . "\n"; // Salida: 0 (porque los primeros 3 caracteres coinciden)

// Otro ejemplo con una longitud diferente
echo "strncmp: " . strncmp("abcdef", "abcxyz", 4) . "\n"; // Salida: -1 (porque la diferencia se encuentra en el cuarto carácter)

//______________________ 1.3 Búsqueda en cadenas

//_ strpos: Busca la primera aparición de una subcadena.
$cadena = "Aprendiendo PHP con ejemplos de PHP";
echo "strpos: " . strpos($cadena, "PHP") . "\n"; // Salida: 12

// Otro ejemplo buscando otra palabra
echo "strpos: " . strpos($cadena, "con") . "\n"; // Salida: 16

// _____strrpos: Busca la última aparición de una subcadena.
echo "strrpos: " . strrpos($cadena, "PHP") . "\n"; // Salida: 31

// Otro ejemplo buscando la última ocurrencia de una letra
echo "strrpos: " . strrpos($cadena, "e") . "\n"; // Salida: 29

// _____strstr: Devuelve la subcadena desde donde encuentra la primera aparición.
echo "strstr: " . strstr($cadena, "PHP") . "\n"; // Salida: PHP con ejemplos de PHP

// Otro ejemplo buscando una palabra diferente
echo "strstr: " . strstr($cadena, "con") . "\n"; // Salida: con ejemplos de PHP

// 1.4 Eliminación de espacios

// __________trim: Elimina los espacios en blanco al inicio y al final de una cadena.
$cadena_espacios = "  Hola, mundo  ";
echo "trim: '" . trim($cadena_espacios) . "'\n"; // Salida: 'Hola, mundo'

// Otro ejemplo con más espacios
$cadena_espacios2 = "    Aprendiendo PHP    ";
echo "trim: '" . trim($cadena_espacios2) . "'\n"; // Salida: 'Aprendiendo PHP'

// _______________ltrim: Elimina los espacios en blanco al inicio de la cadena.
echo "ltrim: '" . ltrim($cadena_espacios) . "'\n"; // Salida: 'Hola, mundo  '

// Otro ejemplo
echo "ltrim: '" . ltrim($cadena_espacios2) . "'\n"; // Salida: 'Aprendiendo PHP    '

//__________________________________________________________________________ rtrim: Elimina los espacios en blanco al final de la cadena.
echo "rtrim: '" . rtrim($cadena_espacios) . "'\n"; // Salida: '  Hola, mundo'

// Otro ejemplo
echo "rtrim: '" . rtrim($cadena_espacios2) . "'\n"; // Salida: '    Aprendiendo PHP'


















// 1.5 Manipulación de subcadenas

// explode(): Divide una cadena en un array usando un separador.
$lista = "manzana,platano,naranja";
$array_frutas = explode(",", $lista);
echo "explode: ";
print_r($array_frutas); // Salida: Array ( [0] => manzana [1] => platano [2] => naranja )

// Otro ejemplo
$cadena_colores = "rojo,verde,azul,amarillo";
$array_colores = explode(",", $cadena_colores);
echo "explode: ";
print_r($array_colores); // Salida: Array ( [0] => rojo [1] => verde [2] => azul [3] => amarillo )

// ________________________________________________________________________implode(): Convierte un array en una cadena usando un separador.
echo "implode: " . implode(" - ", $array_frutas) . "\n"; // Salida: manzana - platano - naranja

// Otro ejemplo con diferentes separadores
echo "implode: " . implode(", ", $array_colores) . "\n"; // Salida: rojo, verde, azul, amarillo

//______________________________________________chr() genera letras
$letra = chr(65); // Genera 'A'
echo "chr: $letra\n"; // Salida: A

$letra = chr(98); // Genera 'b'
echo "chr: $letra\n"; // Salida: b

// ________________________(continuará con más ejemplos de otras funciones...)
?>
