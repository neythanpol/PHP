<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Natan Blanco">
    <title>Funcion semana</title>
</head>
<body>
    <?php
    //Escribe un programa que nos diga el día de la semana que iremos al cine. Llamará a una función que devuelve un día de la semana de forma aleatoria
    function diaSemana($dia){
        switch ($dia) {
            case 1:
                return "Lunes";
                break;
            case 2:
                return "Martes";
                break;
            case 3:
                return "Miercoles";
                break;
            case 4:
                return "Jueves";
                break;
            case 5:
                return "Viernes";
                break;
            case 6:
                return "Sábado";
                break;
            case 7:
                return "Domingo";
                break;
            default:
                return "Día no válido";
                break;
        }
    }
    $dia = rand(1, 7);
    echo "El día de la semana es ".diaSemana($dia);
    ?>
</body>
</html>