<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Natán Blanco">
    <title>Mi Contraseña</title>
</head>
<body>
    <form action="240miContrasenya.php" method="get">
        <label for="contra">Escribe tu contraseña</label>
        <input type="text" name="longi">
        <input type="submit" value="">
    </form>
    <?php
    // Crea una función que a partir de un tamaño y unas necesidades (contiene mayúsculas, carácter numérico, especial...) genere una contraseña. Este programa también permite escribirla y comprueba si cumple los criterios.

    $longi = isset($_GET["longi"]) ? $_GET["longi"] : "";
    
    if (is_numeric($longi)) {
        if ($longi > 3) {
            echo "La longitud de la contraseña es: $longi";
            echo "<br><br>";
        }else{
            echo "La contraseña debe ser mayor a 3";
            echo "<br><br>";
        }
    }else{
        echo "La longi debe ser un número";
    }
    
    function crearContrasenya($longi){
        if ($longi < 4) {
            return "Asegurate de que la contraseña es mayor a 3";
        }else{
        $password = array();
        $contadorContra = [
            "especiales" => 0,
            "mayusculas" => 0,
            "minusculas" => 0,
            "numeros" => 0
        ];
        for ($i=0; $i < $longi; $i++) {
            $columna = random_int(1, 4);
            switch ($columna) {
                case 1:
                    $especial1 = chr(random_int(33, 47));
                    array_push($password, $especial1);
                    $contadorContra["especiales"]++;
                    break;
                
                case 2:
                    $numero = chr(random_int(48, 57));
                    array_push($password, $numero);
                    $contadorContra["numeros"]++;
                    break;

                case 3:
                    $mayuscula = chr(random_int(65, 90));
                    array_push($password, $mayuscula);
                    $contadorContra["mayusculas"]++;
                    break;
                
                case 4:
                    $minuscula = chr(random_int(97, 122));
                    array_push($password, $minuscula);
                    $contadorContra["minusculas"]++;
                    break;

                default:
                    
                    break;
            }
        }
        }
        if ($contadorContra["especiales"] > 0 && $contadorContra["mayusculas"] > 0 && $contadorContra["minusculas"] > 0 && $contadorContra["numeros"] > 0) {
            echo "Contraseña generada correctamente: ";
            $password = implode("", $password);
            return $password;
        }else{
            return crearContrasenya($longi);
        }
    }
    
    echo crearContrasenya($longi);
    ?>
</body>
</html>