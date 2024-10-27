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
        <label for="contra">Ingresa tu contraseña:</label>
        <input type="password" id="contra" name="contra" required><br>
        <label for="tamanio">Elige la longitud de la contraseña</label>
        <select name="longitud" id="longitud" size="3" required>
            <option value="" selected></option>
            <option value="8">8</option>
            <option value="12">12</option>
            <option value="16">16</option>
        </select><br>
        <input type="submit" value="Enviar"><br><br>
    </form>
    <?php
    // Crea una función que a partir de un tamaño y unas necesidades (contiene mayúsculas, carácter numérico, especial...) genere una contraseña. Este programa también permite escribirla y comprueba si cumple los criterios.

    if (isset($_GET["contra"])) {
        $contraIngresada = $_GET["contra"];
    }

    if (isset($_GET["longitud"])) {
        $longitud = intval($_GET["longitud"]);
        if ($longitud === 8 || $longitud === 12 || $longitud === 16) {
            echo "La longitud de la contraseña elegida es: $longitud";
            echo "<br><br>";
            validarContrasenya($contraIngresada, $longitud);
        }
    }

    

    function validarContrasenya($contraIngresada, $longitud){
        $contadorContra = [
            "especiales" => 0,
            "mayusculas" => 0,
            "minusculas" => 0,
            "numeros" => 0
        ];
        if (strlen($contraIngresada) != $longitud) {
            echo "La contraseña debe tener el mismo número de caracteres que has elegido<br>";
            echo crearContrasenya($longitud);
        }else{
            for ($i=0; $i < $longitud; $i++) { 
                $ascii = ord($contraIngresada[$i]);
                if (($ascii >= 33 && $ascii <= 47) || ($ascii >= 58 && $ascii <= 64) || ($ascii >= 94 && $ascii <= 96) || ($ascii >= 123 && $ascii <= 126)) {
                    $contadorContra["especiales"]++;
                }elseif ($ascii >= 48 && $ascii <= 57) {
                    $contadorContra["numeros"]++;
                }elseif ($ascii >= 65 && $ascii <= 90) {
                    $contadorContra["mayusculas"]++;
                }elseif ($ascii >= 97 && $ascii <= 122) {
                    $contadorContra["minusculas"]++;
                }else {
                    echo "Carácter no válido<br>";
                    echo crearContrasenya($longitud);
                }
            }

            if ($contadorContra["especiales"] > 0 && $contadorContra["mayusculas"] > 0 && $contadorContra["minusculas"] > 0 && $contadorContra["numeros"] > 0) {
                echo "Contraseña válida<br>";
                echo $contraIngresada;
            }else{
                echo "Contraseña inválida<br>";
                echo crearContrasenya($longitud);
            }
        }
        
    }

    function crearContrasenya($longitud){
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
        
        if ($contadorContra["especiales"] > 0 && $contadorContra["mayusculas"] > 0 && $contadorContra["minusculas"] > 0 && $contadorContra["numeros"] > 0) {
            echo "Contraseña generada: ";
            $password = implode("", $password);
            return $password;
        }else{
            return crearContrasenya($longitud);
        }
    }
    ?>
</body>
</html>