<?php
    //Creacion de variables conectadas al formulario del php
	$num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $num3 = $_POST["num3"];
    $num4 = $_POST["num4"];
    $num5 = $_POST["num5"];
    $mayor = null;
    // Creamos un array donde se introducen todos los numeros 
    $numeros = array($num1,$num2,$num3,$num4,$num5);
    for ($i=0; $i <count($numeros) ; $i++) { 
    	if ($numeros[$i] >= $mayor) {
    		$mayor = $numeros[$i];
    	}
    }
    // max(numeros $values): mixed Si utilizamos esto nos da tambien el mayor de la variable  max(array($num1,$num2,$num3,$num4,$num5));
    echo "El mayor numero es ". $mayor ;

?>