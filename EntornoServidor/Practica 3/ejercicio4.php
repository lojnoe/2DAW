<?php

/*Realiza un programa en PHP que muestre por pantalla el contenido de la
siguiente matriz utilizando el bucle FOREACH.(3)(1) 
                          (2)(0)
                          
*/
// Creacion de la matriz
$matriz = array(
    array(3,1),
    array(2,0),
);
// Bucle foreach que hace que se vea por pantalla
foreach ($matriz as $fila) {
    echo "| ";
    foreach ($fila as $valor) {
        echo $valor . ' ';
    }
    echo "| <br>";
}
?>