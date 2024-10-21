<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Natán Blanco">
    <title>Mi Contraseña</title>
</head>
<body>
    <?php
    // Crea una función que a partir de un tamaño y unas necesidades (contiene mayúsculas, carácter numérico, especial...) genere una contraseña. Este programa también permite escribirla y comprueba si cumple los criterios.

    if (isset($_GET["longitud"])) {
        $longitud = $_GET["longitud"];

        if (is_numeric($longitud)) {
            if ($longitud > 3) {
                echo "La longitud de la contraseña es: $longitud";
                echo "<br><br>";
            }else{
                echo "La contraseña debe ser mayor a 3";
                echo "<br><br>";
            }
        }else{
            echo "La longitud debe ser un número";
        }
    }else{
        echo "Debes poner la longitud en la URL";
    }

    function crearContrasenya($longitud){
        if ($longitud < 4) {
            return "Asegurate de que la contraseña es mayor a 3";
        }else{

        
        $password = array();
        $contadorContra = [
            "especiales" => 0,
            "mayusculas" => 0,
            "minusculas" => 0,
            "numeros" => 0
        ];
        for ($i=0; $i < $longitud; $i++) { 
            $columna = rand(1, 4);
            switch ($columna) {
                case 1:
                    $especial1 = chr(rand(33, 47));
                    array_push($password, $especial1);
                    $contadorContra["especiales"]++;
                    break;
                
                case 2:
                    $numero = chr(rand(48, 57));
                    array_push($password, $numero);
                    $contadorContra["numeros"]++;
                    break;

                case 3:
                    $mayuscula = chr(rand(65, 90));
                    array_push($password, $mayuscula);
                    $contadorContra["mayusculas"]++;
                    break;
                
                case 4:
                    $minuscula = chr(rand(97, 122));
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
            return crearContrasenya($longitud);
        }
    }
    
    echo crearContrasenya($longitud);
    ?>
</body>
</html>