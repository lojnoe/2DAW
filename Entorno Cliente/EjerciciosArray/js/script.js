/*
Ejercicio 1: 
Crea una función que reciba un array de valores enteros (positivos y negativos),  
y devuelva otro array con la suma parcial de cada elemento del array que se pasa como parámetro.
*/


function ejercicio1() {
    var arrayej1 = document.getElementById("arrayej1");
    var numeros;
    var array = [];


    while (numeros !== "fin") {
        numeros = prompt("Ingresa un número para agregar al array:");
        if (numeros !== "fin") {
            array.push(parseInt(numeros));
        }
    }
    var resultado = sumaelementosarray(array);
    arrayej1.innerHTML = "El array con el que vamos a trabajar es: [" + array + "] y el resultado es [" + resultado + "]";

}

function sumaelementosarray(array) {
    var arraysumado = [];
    var sumatoria = 0;
    for (var i = 0; i < array.length; i++) {
        sumatoria += array[i];
        arraysumado.push(sumatoria);
    }
    return arraysumado;
}

/* Ejercicio 2: Crea una función llamada countBy la cual recibirá dos números enteros
positivos: X e Y. Esta función debe devolver lo siguiente:
 Si alguno de los números es negativo devolverá un array vacío.
 Sino, devolverá con array con los Y primeros múltiplos de X empezando por el 1
(incluido)*/
function countBy() {
    var arrayej2 = document.getElementById("arrayej2");
    var array = [];
    var X, Y;
    Y = prompt("Ingresa numero y ");
    X = prompt("Ingresa numero x");
    if (Math.sign(X) == -1 || Math.sign(Y) == -1) {
        // mostrar por pantalla array vacia
        arrayej2.innerHTML = "Por favor introduce numeros positivos el array esta vacio: [" + array + "]";
    } else {

        for (var i = 1; array.length < Y; i++) {

            array.push(X * i);
        }
        // Poner la array
        arrayej2.innerHTML = "Los " + Y + " primeros multiplos de " + X + "  son : [" + array + "]";
    }


}
/* Ejercicio 3: Crea un script que pida al usuario un numero entero positivo N mayor a 2. Hay
que controlar que el numero introducido sea correcto. Si no es así se volverá a pedir.
A continuación debe crearse una matriz NxN rellena con los resultados de la tabla de
multiplicar de N (empezando en 1). Finalmente, muestra por consola la matriz “en forma de
matriz”
Ej: Para el número 3, el programa debe mostrar
03 06 09
12 15 18
21 24 27
*/
function ejercicio3() {
    var dimensiones;
    var resultadoej3 = document.getElementById("resultadoej3");

    do {
        dimensiones = parseInt(prompt("Introduce un número entero positivo mayor a 2: "));
    } while (isNaN(dimensiones) || dimensiones <= 2);

    var matriz = [];
    var contador = 1;
    for (var i = 1; i <= dimensiones; i++) {
        // Crea fila con cada iteracion
        var fila = [];
        for (var j = 1; j <= dimensiones; j++) {
            // calcula la tabla y la mete dentro de la fila y a su vez dentro de la matriz
            fila.push(contador * dimensiones);
            contador++;
        }
        matriz.push(fila);
    }
    // mostar matriz
    for (var i = 0; i < dimensiones; i++) {
        resultadoej3.innerHTML += "<span>| </span>";
        for (var j = 0; j < dimensiones; j++) {
            resultadoej3.innerHTML += matriz[i][j] + " ";
        }
        resultadoej3.innerHTML += "<span> |</span> <br>"; // Agregar un salto de línea después de cada fila
    }
}



/*
Escriba una función que reciba dos arrays y devuelva un nuevo array con los
elementos que solo aparecen una vez en total (ya sea en el primer o en el segundo array). El
orden debe ser: primero los que están en el primer array y luego los que están en el segundo.
Ejemplos:
[1, 2, 3, 3] y [3, 2, 1, 4, 5]) ==> [4, 5]
["Ray", "Jose", "Dani"] y ["Dani", "Jose", "Ivan"]) ==> ["Ray","Ivan"]
[77, "ciao"] y [78, 42, "ciao"]) ==> [77, 78, 42]
[1, 2, 3, 3] y [3, 2, 1, 4, 5, 4]) ==> [4,5]

*/
function ejercicio4() {
    // juntar arrays comprobar posicion actual hasta el final si no esta repe en otra arrya hacer push de ese numero
    var array1 = [];
    var array2 = [];
    var entrada1, entrada2;

    while (true) {
        entrada1 = prompt("Ingresa un dato para agregar al array1:");
        if (entrada1 === "fin") {
            break;
        }
        array1.push(entrada1);
    }

    while (true) {
        entrada2 = prompt("Ingresa un dato para agregar al array2:");
        if (entrada2 === "fin") {
            break;
        }
        array2.push(entrada2);
    }

    var arraycompuesto = array1.concat(array2);
    var arraydiferencias = [];
    var contador;
    var encontrados = [];
    for (var i = 0; i < arraycompuesto.length; i++) {
        contador = 0;
        for (var j = 1; j < arraycompuesto.length; j++) {
            // [1, 2, 3, 3] y [3, 2, 1, 4, 5]) ==> [4, 5]
            // [1, 2, 3, 3,3, 2, 1, 4, 5]
            if (arraycompuesto[i] === arraycompuesto[j] && i !== j) {
                encontrados.push(arraycompuesto[i]);
                break;
            }
        }
        if (contador == 0 && !encontrados.includes(arraycompuesto[i])) {
            arraydiferencias.push(arraycompuesto[i]);
        }

    }
    arrayej4.innerHTML = "Los elementos diferentes son: [" + arraydiferencias + "]";
}

function ejercicio5() {

}
function ejercicio6() {

}
function ejercicio7() {
    var arrayNombres = [];
    var datos;
    var numLikes;
    var resultado;
    var otros;


    while (true) {
        datos = prompt("Ingresa un dato para agregar al array de likes:");
        if (datos === "fin") {
            break;
        }
        arrayNombres.push(datos);
    }

    numLikes = arrayNombres.length;

    if (numLikes === 0) {
        resultado = "no one likes this";
    } else if (numLikes === 1) {
        resultado = arrayNombres[0] + " likes this";
    } else if (numLikes === 2) {
        resultado = arrayNombres[0] + " and " + arrayNombres[1] + " like this";
    } else if (numLikes === 3) {
        resultado = arrayNombres[0] + ", " + arrayNombres[1] + " and " + arrayNombres[2] + " like this";
    } else {
        otros = numLikes - 2;
        resultado = arrayNombres[0] + ", " + arrayNombres[1] + " and " + otros + " others like this";
    }


    arrayej7.innerHTML = "[" + arrayNombres + "] --> " + resultado;
}
function ejercicio8() {

}   

/*Un restaurante nos ha encargado una aplicación para colocar a los clientes en sus
mesas. En una mesa se pueden sentar de 0 (mesa vacía) a 4 comensales (mesa llena).
El funcionamiento es el siguiente:
Cuando llega un cliente se le pregunta cuántos son. Como el programa no está preparado para
colocar a grupos mayores a 4, si un cliente solicita una mesa con mas comensales (pej, 6), el
programa dará el mensaje “Lo siento, no admitimos grupos de 6, haga grupos de 4 personas
como máximo e intente de nuevo” y volverá a preguntar.dddd
Para cada grupo nuevo que llega, se busca siempre la primera mesa libre (con 0 personas). Si
no quedan mesas libres, se busca una donde haya hueco para todo el grupo (por ejemplo si el
grupo es de dos personas, se podrá colocar en mesas donde haya una o dos personas).
Cada vez que se sientan nuevos clientes se debe mostrar el estado de las mesas.
Los grupos no se pueden romper aunque haya huecos sueltos suficientes.
A tener en cuenta:
 El programa comienza pidiendo el numero de mesas que tiene el restaurante.
 Inicialmente, las mesas se cargan con valores aleatorios entre 0 y 4 y mostrará por
pantalla como quedan las mesas inicialmente.
 El programa seguirá pidiendo comensales hasta que se introduzca un valor negativo 
     */

function ejercicio9() {
    var mesas = [];
    var numMesas;
    var numPersonas;
    var mensajePersonas;
    
    do {
        numMesas = parseInt(prompt("Indica el número de mesas"));
    } while (numMesas <= 0);

    // Rellenar mesas con valores aleatorios entre 0 y 4.
    for (var i = 0; i < numMesas; i++) {
        mesas.push(Math.floor(Math.random() * 5));
    }
    console.log("Estado inicial de las mesas: " + mesas);

    do {
        numPersonas = parseInt(prompt("¿Cuántas personas son?"));
        
        if (numPersonas <= 0) {
            console.log("¡Gracias por visitarnos!");
            break;
        } else if (numPersonas > 4) {
            mensajePersonas = "Lo siento, no admitimos grupos de " + numPersonas + " personas. Haga grupos de 4 personas como máximo";
        } else {
            var sentado = false;

            for (var i = 0; i < mesas.length; i++) {
                if (mesas[i] === 0) {
                    mesas[i] = numPersonas;
                    mensajePersonas = "Sientese en la mesa " + i;
                    sentado = true;
                    break;
                } else if (mesas[i] >= numPersonas && mesas[i] < 4) {
                    mesas[i] += numPersonas;
                    mensajePersonas = "Sientese en la mesa " + i;
                    sentado = true;
                    break;
                }
            }

            if (!sentado) {
                mensajePersonas = "Lo siento, no hay mesas disponibles para " + numPersonas + " personas en este momento.";
            }
        }
        console.log(mensajePersonas);
        console.log("Estado de las mesas después de la asignación: " + mesas);
    } while (numPersonas > 0);
}