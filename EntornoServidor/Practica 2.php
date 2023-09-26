<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica 2</title>
</head>

<body>
    <?php
    echo "1.a Variable de tipo String con valor “Hola” concatenada a un espacio y concatenada  a  una  variable  de  tipo  String  con  valor  “Mundo”. Guarda la concatenación en una nueva variable.";
    echo "<br>";
    $var = "Hola";
    $var1 = "Mundo";
    $var2 = $var . " " . $var1;
    echo $var2;
    echo "<br>";
    //  1.b Variable de tipo boolean con valor “true”. 
    $booleano = true;
    echo $booleano;
    echo "<br>";
    //  1.c Variable de tipo float con valor “3,14”.”. 
    $float = 3.14;
    echo $float;
    echo "<br>";
    /*  1.d Variable  de  tipo  array que contenga los valores “1”, “2” y “3” y 
        tengan como clave valor1, valor2 y valor3 respectivamente”. */
    $array = array('valor1' => 1, 'valor2' => 2, 'valor3' => 3);
     print_r($array);
    echo "<br>";
    /*2. Cambia  la  variable  de  tipo  boolean  a valor “false”. Muestra el resultado 
    obtenido al ejecutarlo con el servidor. ¿Qué ocurre y por qué?
    */
    $booleano = false;
    echo $booleano;
    echo "<br>";
    /*3. Elimina  los  espacios  de  la  variable  concatenada  utilizando  la  función 
    correspondiente.
    */
    echo str_replace(" ", "", $var2);
    echo "<br>";
    /* 4.Muestra por pantalla el siguiente mensaje:  
    El operador “+” sirve para sumar el valor de variables. Con la “/”podemos 
    dividir valores entre variables. El símbolo del dólar “$” indica que estamos 
    utilizando variables pero no lo usaremos en las constantes o globales. 
    */

    echo "El operador “+” sirve para sumar el valor de variables. Con la “/”podemos 
    dividir valores entre variables. El símbolo del dólar “\$” indica que estamos 
    utilizando variables pero no lo usaremos en las constantes o globales.";
    /* 5. Almacena la cadena anterior en una variable y usa la función 
    correspondiente para indicar la longitud de la cadena.
    */
    $texto = "El operador “+” sirve para sumar el valor de variables. Con la “/”podemos 
    dividir valores entre variables. El símbolo del dólar “\$” indica que estamos 
    utilizando variables pero no lo usaremos en las constantes o globales.";
    echo "<br>";
    echo strlen($texto);

    /* 6. Utiliza  la  función  correspondiente  para  eliminar  las  vocales  en  la  frase 
    “Hello World”
    */
    
    echo "<br>";
    $HolaMundo = "Hello World";
    
    $HolaMundo = str_replace("e", "", "$HolaMundo");
    $HolaMundo = str_replace("o", "", "$HolaMundo");
    
    echo $HolaMundo;
    
    /* 7. Crea  una  variable  sin  contenido  y  usa  la  función  correspondiente  para 
    comprobar si está vacía. ¿Qué ocurre y por qué */
    echo "<br>";
    $sincontenido;
    echo is_null($sincontenido);
    /* 8. Convierte la variable que contiene la frase “Hello World” y conviértela en 
    entero. ¿Qué ocurre y por qué?*/
    echo "<br>";
    echo intval($HolaMundo);
    /* 9.Crea programas que calcule lo siguiente: (2 puntos) 
    //a. La raíz cuadrada de 144 
    //b. La potencia 28 
    //c. El resto de la división de 100/6 
    //d. El máximo común divisor de 3 y 6*/
    echo "<br>";
    echo "<br>";
    echo sqrt(144);
    echo "<br>";
    echo pow(2, 8);
    echo "<br>";
    echo 100 / 6;
    echo "<br>";
    
    function obtener_mcd($a, $b) {
        if($b==0)
            return $a;
        else
            return obtener_mcd($b, $a%$b);
    } 
    echo("Cual es el mcd de 3 y 6? Es ".obtener_mcd(3,6));

    ?>
</body>

</html>