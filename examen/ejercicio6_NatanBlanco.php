<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Natán Blanco">
    <title>Ejercicio 6</title>
</head>
<body>
    <?php
    // Crea un programa calculaSueldo al que le pases la edad y el sueldo de una persona y devuelve el nuevo sueldo de esa persona (la edad mínima de la persona debe ser de 16 años).

    // Si el sueldo supera los 3000€ no cambiará el sueldo, pero si el sueldo se encuentra entre 2000€ y 3000€, tendremos en cuenta la edad, ya que si tiene más de 40 años se sube un 20% y un 13% al resto.

    // En el caso de que el sueldo sea inferior a 2000€, a los menores de 30 años, se les asignará un sueldo de 2030€. Si la edad está comprendida entre 30 y 40 años, se les sube un 4%. En otro caso les subirá un 15%.

    // El programa nos dice la edad, el sueldo anterior y el nuevo sueldo además de imprimir por pantalla la fecha/hora completa en la que se ha generado el sueldo.

    function calculaSueldo($edad, $sueldo){
        $nuevoSueldo = 0; // Inicializo la variable
        // Si no tiene la edad entonces retorno que debe tener mínimo 16 años
        if ($edad < 16) {
            return "La edad debe ser mínimo de 16 años";
        }else{
            // Condiciono los casos por sueldo
            if ($sueldo > 3000) {
                $nuevoSueldo = $sueldo; 
            }elseif ($sueldo < 2000) {
                // En caso de que también se necesite mirar la edad, condiciono por edad
                if ($edad < 30) {
                    $nuevoSueldo = 2030;
                }elseif ($edad > 40) {
                    $nuevoSueldo = $sueldo + (($sueldo / 100) * 15);
                }else{
                    $nuevoSueldo = $sueldo + (($sueldo / 100) * 4);
                }
            }else{
                if ($edad > 40) {
                    $nuevoSueldo = $sueldo + (($sueldo / 100) * 20);
                }else{
                    $nuevoSueldo = $sueldo + (($sueldo / 100) * 13);
                }
            }
        }
        // Valor de retorno
        return "El trabajador tiene $edad años de edad y su sueldo era de $sueldo €.<br>Por lo tanto, su nuevo sueldo es $nuevoSueldo €.<br><br>A fecha de ".date("r");
    }
    // Prueba de la función
    echo calculaSueldo(31, 2050);
    ?>
</body>
</html>