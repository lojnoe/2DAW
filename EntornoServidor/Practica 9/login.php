<?php
	if (isset($_POST['login'])) {
		//almacena las variables del formulario login
	    $user = $_POST["user"];
	    $password = $_POST["password"];
	    // comprueba si es usuario o admin
	    if ($_POST['user'] == $admin['user'] && $_POST['password'] == $admin['password'] || 
	    	$_POST['user'] == $usuario['user'] && $_POST['password'] == $usuario['password']
	) {
        //inicia la sesión
        session_start();
        //inicializa las variables de los datos que deseamos guardar
        $_SESSION['iniciada'] = true;
        $_SESSION['user_id']= $user;
        //Guarda la fecha y hora de la conexión si no existe
        if (!isset($_SESSION['login_time'])) {
            $_SESSION['login_time'] = date('l jS \of F Y h:i:s A');
        }
        //redirecciona al index donde estan todas las funciones de los ficheros
        header("Location: index.php"); 
        //Si no ha encontrado coincidencia con el query sql redirecióna al index.html donde esta formulario de login
    } else {
        header("Location: index.html");
    }
	}
    require_once 'conexion.php';
    if (isset($_POST['register'])) {
        //almacena las variables del formulario login
        $user = $_POST["user"];
        $password = $_POST["password"];
    
        if($password == $reppasword){
            // comprueba si es usuario o admin
            $sql = "INSERT INTO users (user, email, password)
            VALUES ('$user','$email','$password') ";
            if(mysqli_query($conexion, $sql)){
              echo ("Registro completo");
              // header('Location: index.html');
            } else {
              echo("Inicio de sesion  fallido");
            }
        }else{
          echo "Las contraseñas no coinciden";
          header("Location: reg.html");
        }
        
    }
    
?>