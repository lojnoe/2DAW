<?php
        $precio = $_POST['precio'];
        echo "Precio de Compra: " . number_format($precio, 2) . "€<br>";

        $gastosEnvio = 0;

        switch (true) {
            case $precio < 50:
                $gastosEnvío = 3.95;
                break;
            case $precio >= 50 && $precio < 75:
                $gastosEnvío = 2.95;
                break;
            case $precio >= 75 && $precio < 100:
                $gastosEnvío = 1.95;
                break;
            default:
                $gastosEnvío = 0;
        }

        echo "Gastos de envío: " . number_format($gastosEnvío, 2) . "€";
    
    ?>