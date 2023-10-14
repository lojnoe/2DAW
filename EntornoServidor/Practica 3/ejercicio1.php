
<?php
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $precio = $_POST["precio"];
    
    if ($precio < 50) {
            $gastosEnvio = 3.95;
            
            
        } elseif ($precio >= 50 && $precio < 75) {
            $gastosEnvio = 2.95;
            
        } elseif ($precio >= 75 && $precio < 100) {
            $gastosEnvio = 1.95;
           
        } else {
            $gastosEnvio = 0; 
           
        }
     echo "Precio de Compra: " . number_format($precio, 2) . "€<br>";   
     echo "Gastos de envios son: ". $gastosEnvio . "<br/>";
?>	   
