
<?php
    //Creacion de variables conectadas al formulario del php
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $precio = $_POST["precio"];
    // If con las condiciones del precio qe se introduce en una variable que luego sale al pulsar el boton
    if ($precio < 50) {
            $gastosEnvio = 3.95;

        } elseif ($precio >= 50 && $precio < 75) {
            $gastosEnvio = 2.95;
            
        } elseif ($precio >= 75 && $precio < 100) {
            $gastosEnvio = 1.95;
           
        } else {
            $gastosEnvio = 0; 
        }
        // Sale por pantalla el precio de la cesta y sus gastos de envio
     echo "Precio de Compra: " . number_format($precio, 2) . "€<br>";   
     echo "Gastos de envios son: ". $gastosEnvio . "<br/>";
?>	   
