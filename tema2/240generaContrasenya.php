<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Natán Blanco">
    <title>Contraseña</title>
</head>
<body>
    <?php
    // Crea una función que a partir de un tamaño y unas necesidades (contiene mayúsculas, carácter numérico, especial...) genere una contraseña. Este programa también permite escribirla y comprueba si cumple los criterios.
    function generarContrasena($longitud, $incluirMayusculas, $incluirNumeros, $incluirEspeciales) {
        $minusculas = "abcdefghijklmnopqrstuvwxyz";
        $mayusculas = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $numeros = "0123456789";
        $especiales = "!@#$%^&*()-_=+[]{}|;:,.<>?";

        $caracteres = $minusculas;

        // Añade los conjuntos de caracteres si se requiere
        if ($incluirMayusculas) {
            $caracteres .= $mayusculas;
        }
        if ($incluirNumeros) {
            $caracteres .= $numeros;
        }
        if ($incluirEspeciales) {
            $caracteres .= $especiales;
        }

        $contrasena = "";
        for ($i = 0; $i < $longitud; $i++) {
            $aleatorio = rand(0, strlen($caracteres) - 1);
            $contrasena .= $caracteres[$aleatorio];
        }

        return $contrasena;
    }

    function verificarContrasena($contrasena, $incluirMayusculas, $incluirNumeros, $incluirEspeciales) {
        // Verifica si la contraseña contiene al menos una mayúscula
        if ($incluirMayusculas && !preg_match('/[A-Z]/', $contrasena)) {
            return false;
        }

        // Verifica si la contraseña contiene al menos un número
        if ($incluirNumeros && !preg_match('/[0-9]/', $contrasena)) {
            return false;
        }

        // Verifica si la contraseña contiene al menos un carácter especial
        if ($incluirEspeciales && !preg_match('/[!@#$%^&*()\-_=+\[\]{}|;:,.<>?]/', $contrasena)) {
            return false;
        }

        // Si cumple con todos los requisitos, devuelve true
        return true;
    }

    // Ejemplo de uso
    $tamano = 12;
    $incluirMayusculas = true;
    $incluirNumeros = true;
    $incluirEspeciales = true;

    // Genera una contraseña con los criterios especificados
    $contrasenaGenerada = generarContrasena($tamano, $incluirMayusculas, $incluirNumeros, $incluirEspeciales);
    echo "Contraseña generada: $contrasenaGenerada\n";

    // Verifica si una contraseña cumple los criterios
    $contraseñaIngresada = "MiContraseña123!";
    if (verificarContrasena($contraseñaIngresada, $incluirMayusculas, $incluirNumeros, $incluirEspeciales)) {
        echo "La contraseña ingresada cumple con los requisitos.<br><br>";
    } else {
        echo "La contraseña ingresada no cumple con los requisitos.<br><br>";
    }
    ?>
</body>
</html>