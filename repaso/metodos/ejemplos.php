<?php
    // Añade uno o más elementos al final de un array.
    $arr = array(1, 2, 3);
    array_push($arr, 4);
    print_r($arr); // Array ( [0] => 1 [1] => 2 [2] => 3 [3] => 4 )
    
    // Elimina el último elemento de un array y lo devuelve.
    $arr = array(1, 2, 3, 4);
    $last = array_pop($arr);
    print_r($arr); // Array ( [0] => 1 [1] => 2 [2] => 3 )
    echo $last; // 4

    // Elimina el primer elemento de un array y lo devuelve.
    $arr = array(1, 2, 3, 4);
    $first = array_shift($arr);
    print_r($arr); // Array ( [0] => 2 [1] => 3 [2] => 4 )
    echo $first; // 1

    // Añade uno o más elementos al inicio de un array.
    $arr = array(2, 3, 4);
    array_unshift($arr, 1);
    print_r($arr); // Array ( [0] => 1 [1] => 2 [2] => 3 [3] => 4 )

    // Elimina una porción del array y la reemplaza con otros valores.
    $arr = array(1, 2, 3, 4);
    array_splice($arr, 1, 2, array('a', 'b'));
    print_r($arr); // Array ( [0] => 1 [1] => a [2] => b [3] => 4 )

    // Devuelve una porción del array.
    $arr = array(1, 2, 3, 4);
    $newArr = array_slice($arr, 1, 2);
    print_r($newArr); // Array ( [0] => 2 [1] => 3 )

    // Combina uno o más arrays.
    $arr1 = array(1, 2);
    $arr2 = array(3, 4);
    $newArr = array_merge($arr1, $arr2);
    print_r($newArr); // Array ( [0] => 1 [1] => 2 [2] => 3 [3] => 4 )

    // Busca un valor en un array y devuelve la clave correspondiente si se encuentra.
    $arr = array(1, 2, 3, 4);
    $key = array_search(3, $arr);
    echo $key; // 2

    // Itera sobre cada elemento de un array.
    $arr = array(1, 2, 3);
    foreach ($arr as $element) {
        echo $element . "\n"; // 1 2 3
    }

    // Aplica una función a cada elemento del array.
    $arr = array(1, 2, 3);
    $newArr = array_map(function($element) {
        return $element * 2;
    }, $arr);
    print_r($newArr); // Array ( [0] => 2 [1] => 4 [2] => 6 )

    // Filtra elementos de un array utilizando una función de devolución de llamada.
    $arr = array(1, 2, 3, 4);
    $newArr = array_filter($arr, function($element) {
        return $element > 2;
    });
    print_r($newArr); // Array ( [2] => 3 [3] => 4 )

    // Reduce un array a un solo valor utilizando una función de devolución de llamada.
    $arr = array(1, 2, 3, 4);
    $sum = array_reduce($arr, function($carry, $item) {
        return $carry + $item;
    }, 0);
    echo $sum; // 10

    // Comprueba si una clave existe en un array.
    $arr = array('a' => 1, 'b' => 2, 'c' => 3);
    $key_exists = array_key_exists('b', $arr);
    var_dump($key_exists); // bool(true)

    // Devuelve todas las claves de un array.
    $arr = array('a' => 1, 'b' => 2, 'c' => 3);
    $keys = array_keys($arr);
    print_r($keys); // Array ( [0] => a [1] => b [2] => c )

    // Devuelve todos los valores de un array.
    $arr = array('a' => 1, 'b' => 2, 'c' => 3);
    $values = array_values($arr);
    print_r($values); // Array ( [0] => 1 [1] => 2 [2] => 3 )

    // Ordenamiento arrays
    // Ordena un array indexado en orden ascendente.
    $arr = array(3, 2, 5, 1, 4);
    sort($arr);
    print_r($arr); // Array ( [0] => 1 [1] => 2 [2] => 3 [3] => 4 [4] => 5 )

    // Ordena un array indexado en orden descendente.
    $arr = array(3, 2, 5, 1, 4);
    rsort($arr);
    print_r($arr); // Array ( [0] => 5 [1] => 4 [2] => 3 [3] => 2 [4] => 1 )

    // Ordena un array asociativo en orden ascendente, manteniendo las claves.
    $arr = array('b' => 2, 'a' => 3, 'd' => 1, 'c' => 4);
    asort($arr);
    print_r($arr); // Array ( [d] => 1 [b] => 2 [a] => 3 [c] => 4 )

    // Ordena un array asociativo en orden descendente, manteniendo las claves.
    $arr = array('b' => 2, 'a' => 3, 'd' => 1, 'c' => 4);
    arsort($arr);
    print_r($arr); // Array ( [c] => 4 [a] => 3 [b] => 2 [d] => 1 )

    // Ordena un array asociativo por claves en orden ascendente.
    $arr = array('b' => 2, 'a' => 3, 'd' => 1, 'c' => 4);
    ksort($arr);
    print_r($arr); // Array ( [a] => 3 [b] => 2 [c] => 4 [d] => 1 )

    // Ordena un array asociativo por claves en orden descendente.
    $arr = array('b' => 2, 'a' => 3, 'd' => 1, 'c' => 4);
    krsort($arr);
    print_r($arr); // Array ( [d] => 1 [c] => 4 [b] => 2 [a] => 3 )

    // Ordena un array usando una función de comparación definida por el usuario.
    $arr = array(3, 2, 5, 1, 4);
    usort($arr, function($a, $b) {
        return $a - $b;
    });
    print_r($arr); // Array ( [0] => 1 [1] => 2 [2] => 3 [3] => 4 [4] => 5 )

    // Ordena un array asociativo usando una función de comparación definida por el usuario, manteniendo las claves.
    $arr = array('b' => 2, 'a' => 3, 'd' => 1, 'c' => 4);
    uasort($arr, function($a, $b) {
        return $a - $b;
    });
    print_r($arr); // Array ( [d] => 1 [b] => 2 [a] => 3 [c] => 4 )

    // Ordena un array asociativo por claves usando una función de comparación definida por el usuario.
    $arr = array('b' => 2, 'a' => 3, 'd' => 1, 'c' => 4);
    uksort($arr, function($a, $b) {
        return strcmp($a, $b);
    });
    print_r($arr); // Array ( [a] => 3 [b] => 2 [c] => 4 [d] => 1 )

    // Ordena varios arrays o arrays multidimensionales.
    $arr1 = array(3, 2, 5, 1, 4);
    $arr2 = array('c', 'b', 'e', 'a', 'd');
    array_multisort($arr1, $arr2);
    print_r($arr1); // Array ( [0] => 1 [1] => 2 [2] => 3 [3] => 4 [4] => 5 )
    print_r($arr2); // Array ( [0] => a [1] => b [2] => c [3] => d [4] => e )

    // 
?>