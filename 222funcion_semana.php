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
    function diaSemana($dia){
        switch ($dia) {
            case 1:
                echo "Lunes";
                break;
            case 2:
                echo "Martes";
                break;
            case 3:
                echo "Miercoles";
                break;
            case 4:
                echo "Jueves";
                break;
            case 5:
                echo "Viernes";
                break;
            case 6:
                echo "Sábado";
                break;
            case 7:
                echo "Domingo";
                break;
            default:
            echo "Día no válido";
                break;
        }
    }
    $dia = rand(1, 7);
    echo "El día de la semana es ".diaSemana($dia);
    ?>
</body>
</html>