<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica 2</title>
</head>

<body>
    <?php
    /* 1.a Variable de tipo String con valor “Hola” concatenada a un espacio y 
            concatenada  a  una  variable  de  tipo  String  con  valor  “Mundo”. 
            Guarda la concatenación en una nueva variable. */
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
    echo $array;
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

    
    /* 4.Muestra por pantalla el siguiente mensaje:  
    El operador “+” sirve para sumar el valor de variables. Con la “/”podemos 
    dividir valores entre variables. El símbolo del dólar “$” indica que estamos 
    utilizando variables pero no lo usaremos en las constantes o globales. (1 
    punto)
    */
    ?>
</body>

</html>