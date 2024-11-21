<?php

// Incluimos el archivo donde se define la función de conexión
include "conexionPDOFuncion.php";

// Llamamos a la función conexion() para obtener un objeto PDO
$conexion = obtenerConexion();

//_________________________________Ejemplo con bindParam()

// Sentencia SQL para insertar datos en la tabla "persona"
$sql = "INSERT INTO persona (nombre, apellidos) VALUES (:nombre, :apellidos)";

// Preparo la consulta
$sentencia = $conexion->prepare($sql);

// Vinculo los parámetros usando bindParam()
// Aquí se vinculan variables que se pueden modificar antes de ejecutar la consulta
$sentencia->bindParam(':nombre', $nombre, PDO::PARAM_STR); // El parámetro :nombre se vincula a la variable $nombre, especificando que es un string
$sentencia->bindParam(':apellidos', $apellidos, PDO::PARAM_STR); // El parámetro :apellidos se vincula a la variable $apellidos, especificando que es un string

// Defino valores para las variables vinculadas
$nombre = "Juan";
$apellidos = "Pérez";

// Ejecuto la consulta
$sentencia->execute();

echo "Datos insertados!!";


//_____________Ejemplo con bindValue()
/*
// Sentencia SQL para insertar datos en la tabla "persona"
$sql = "INSERT INTO persona (nombre, apellidos) VALUES (:nombre, :apellidos)";

// Preparo la consulta
$sentencia = $conexion->prepare($sql);

// Vinculo los parámetros usando bindValue()
// Aquí se fijan los valores en el momento de la vinculación
$sentencia->bindValue(':nombre', $nombre, PDO::PARAM_STR); // El parámetro :nombre se fija al valor actual de $nombre, especificando que es un string
$sentencia->bindValue(':apellidos', $apellidos, PDO::PARAM_STR); // El parámetro :apellidos se fija al valor actual de $apellidos, especificando que es un string

// Defino valores para las variables (no afecta a los valores ya vinculados con bindValue)
$nombre = "Juan";
$apellidos = "Pérez";

// Ejecuto la consulta
$sentencia->execute();

echo "Datos insertados!!";
*/



?>

