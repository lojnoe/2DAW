<?php
require_once 'conexion.php';
if (isset($_POST['register'])) {
    //almacena las variables del formulario login
    $user = $_POST["user"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $reppasword = $_POST["reppassword"];

    if($password == $reppasword){
        // comprueba si es usuario o admin
        $sql = "INSERT INTO users (user, email, password)
        VALUES ('$user','$email','$password') ";
    }else{
        
    }
    


    if(mysqli_query($conexion, $sql)){
      echo ("Almacenado");
    } else {
      echo("Fallido");
    }
    
}

?>