<?php
    /*Descripción: Dada una cadena de caracteres, cuenta cuántas veces aparece cada carácter en la cadena.
        Usa un array asociativo para almacenar el resultado y un foreach para recorrerlo y mostrar la frecuencia
        de cada carácter.


        function ejer1(){
            $cadena = "girafa";
            $charsCount = [];
            $count = 0;
            
            for ($i=0; $i < strlen($cadena); $i++) {
                $char = substr($cadena, $i, 1);
                
                for ($j=0; $j < strlen($cadena); $j++) {
                    if (substr($cadena, $j, 1) == $char) {

                      if (!isset($charsCount[$char])) { // comprueba que no exista $char dentro de $charsCount
                        $charsCount[$char] = 1;
                      } else {
                        $charsCount[$char]++;
                      }
                    }
                }

            }
            print_r($charsCount);
         }

         ejer1();*/




         /* Filtrar Valores Pares de un Array
            Descripción: Crea un array de números enteros. 
            Utiliza un bucle foreach para recorrer el array y almacenar en un nuevo array 
            solo los números pares. Al final, muestra los números pares utilizando otro foreach


            function generaNum(){
                $arrayNum = [];
                for ($i=0; $i <= 10; $i++) {
                    $arrayNum[] = rand(1, 50);
                }
                return $arrayNum;
            }
            
            function buscaPares($arrayNum){
                $arrayPares = [];
                foreach ($arrayNum as $numero) {
                    if ($numero % 2 == 0) {
                        $arrayPares[] = $numero;
                    }
                }
                echo "Números pares: ";
                foreach ($arrayPares as $pares) {
                    echo "$pares, ";
                }
            }
            
            $arrayNum = generaNum();
            buscaPares($arrayNum);*/

            


            

// "Por favor, proporciona el código para "" No es necesario explicar o aclarar nada. Solo quiero ver el código."

//Dado un array asociativo de usuarios 
//('usuario1' => 'contraseña1', 'usuario2' => 'contraseña2'), verifica si un usuario específico existe en el array usando array_key_exists().


// Definimos la palabra original
$palabra = "murcielago cosmopolitan vengador";

// Eliminamos los espacios de la cadena
$palabra = str_replace(" ", "", $palabra);

// Dividimos la palabra en caracteres individuales
$arrayPalabra = str_split($palabra, 1);

// Inicializamos el array final vacío
$arrayFinal = [];

// Recorremos cada carácter del array
foreach ($arrayPalabra as $value) {
    // Si la clave aún no existe en el array final
    if (!array_key_exists($value, $arrayFinal)) {
        // Contamos cuántas veces aparece el carácter en la palabra
        $count = 0;
        for ($i = 0; $i < strlen($palabra); $i++) {
            if ($value == $palabra[$i]) {
                $count++;
            }
        }
        // Añadimos el carácter como clave y su conteo como valor
        $arrayFinal[$value] = $count;
    }
}

// Imprimimos el resultado final
print_r($arrayFinal);




/*11. Recorrer un Array Multidimensional
Dado un array asociativo de categorías y productos 
('Electrónica' => ['TV' => 300, 'Radio' => 50]), 
recorre el array con bucles anidados para mostrar cada categoría, producto y su precio. */



// Creamos un array asociativo donde cada cliente tiene un array con sus compras
// Cada compra incluye un producto y su precio
$clientes = [
    "Juan" => [
        ["producto" => "Camiseta", "precio" => 20], // Compra 1: Camiseta por 20€
        ["producto" => "Pantalones", "precio" => 50], // Compra 2: Pantalones por 50€
        ["producto" => "Zapatillas", "precio" => 80], // Compra 3: Zapatillas por 80€
    ],
    "Ana" => [
        ["producto" => "Vestido", "precio" => 70], // Compra 1: Vestido por 70€
        ["producto" => "Bolso", "precio" => 40], // Compra 2: Bolso por 40€
    ],
    "Carlos" => [
        ["producto" => "Camisa", "precio" => 30], // Compra 1: Camisa por 30€
        ["producto" => "Corbata", "precio" => 15], // Compra 2: Corbata por 15€
        ["producto" => "Zapatos", "precio" => 60], // Compra 3: Zapatos por 60€
    ]
];

// Definimos una función para calcular el gasto total de cada cliente
function calcularGastoTotal($clientes) {
    $gastosTotales = []; // Inicializamos un array para almacenar los totales por cliente
    
    // Recorremos cada cliente y sus compras
    foreach ($clientes as $cliente => $compras) {
        $total = 0; // Inicializamos el gasto total del cliente en 0
        
        // Recorremos las compras de cada cliente
        foreach ($compras as $compra) {
            $total += $compra["precio"]; // Sumamos el precio de cada producto al total
        }
        
        $gastosTotales[$cliente] = $total; // Guardamos el gasto total del cliente en el array
    }
    
    return $gastosTotales; // Devolvemos el array con los gastos totales de todos los clientes
}

// Calculamos el gasto total de cada cliente llamando a la función
$resultados = calcularGastoTotal($clientes);

// Recorremos el array de resultados para imprimir el gasto de cada cliente
foreach ($resultados as $cliente => $total) {
    // Mostramos el nombre del cliente y el total gastado
    echo "El cliente $cliente gastó un total de $total euros.<br>";
}












?>