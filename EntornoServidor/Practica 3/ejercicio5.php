<?php

/*Realiza un programa en PHP que sume las siguientes matrices y muestre
por pantalla el resultado:(1)(0) (0)(1)
                          (0)(1) (1)(0) 
                          
*/
// Creacion de la matriz
$matriz = array(
    array(1,0),
    array(0,1),
);

// Creacion de la matriz
$matriz1 = array(
    array(0,1),
    array(1,0),
);

$resultado;

// Creacion de un bucle for que con una matriz resultado vacia introduce la operacion entre las matrices

for($i=0;$i<count($matriz);$i++){
    for($j=0;$j<count($matriz);$j++){
        $resultado[$i][$j] = $matriz[$i][$j]+$matriz1[$i][$j];
    }
}

// Bucle for each que hace que se vea la matriz por pantalla
foreach ($resultado as $fila) {
    echo "| ";
    foreach ($fila as $valor) {
        echo $valor . ' ';
    }
    echo "| <br>";
}

?>
