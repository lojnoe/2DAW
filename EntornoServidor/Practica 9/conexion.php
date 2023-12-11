<?php
// conectar con la base de datos.
    $servidor = "localhost";
	$usuario = "root";
	$pass = "";
	$basedatos = "practica";
	
	//Establecer la conexión con MySQL
	$conexion = mysqli_connect($servidor,$usuario,$pass) or die("Error de conexión");
	
	//Seleccionamos la Base de Datos
	mysqli_select_db($conexion,$basedatos);


?>