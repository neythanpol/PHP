



<?php

//como enviar el id de algo en oculto y como meter un mensage de confirmacion de algo en un boton submit
?>

<html>
<!--forma alternativa de enviar el id --> <input type="hidden" name="id_editorial" value="<?php echo $editorial['id_editorial']; ?>"> <!--forma alternativa de enviar el id -->
            
<!-- Botón de modificar con confirmación -->
<button type="submit" onclick="return confirm('¿Estás seguro de que deseas modificar la editorial: <?php echo $editorial['nombre']; ?>?');">Modificar</button>
</html>