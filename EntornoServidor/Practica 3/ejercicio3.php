<?php
	$num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $num3 = $_POST["num3"];
    $num4 = $_POST["num4"];
    $num5 = $_POST["num5"];
    $mayor = null;

    $numeros = array($num1,$num2,$num3,$num4,$num5);
    for ($i=0; $i <count($numeros) ; $i++) { 
    	if ($numeros[$i] >= $mayor) {
    		$mayor = $numeros[$i];
    	}
    }

    echo "El mayor numero es ". $mayor ;

?>