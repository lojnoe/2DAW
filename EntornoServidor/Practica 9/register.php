<?php
require_once 'conexion.php';
session_start();
if (isset($_POST['register'])) {
    //almacena las variables del formulario login
    $user = $_POST["user"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $reppasword = $_POST["reppassword"];

    if($password == $reppasword){
        // comprueba si es usuario o admin
        $sql = "INSERT INTO users (name, email, password)
        VALUES ('$user','$email','$password') ";
        if(mysqli_query($conexion, $sql)){
          $_SESSION['iniciada'] = true;
          $_SESSION['user'] = $user;
          echo ("Registro completo");
          header('Location: index.php');
        } else {
          echo("Registro fallido");
          header('Location: register.html');
        }
    }else{
      echo "Las contraseñas no coinciden";
      header('Location: register.html');
    }
    
}
  
?>
