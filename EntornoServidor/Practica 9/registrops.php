<?php
require_once 'conexion.php';
session_start(); // Inicia la sesión al principio del script

if (isset($_POST['register'])) {
    // Almacena las variables del formulario login
    $user = $_POST["user"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $reppassword = $_POST["reppassword"];

    // Verifica si las contraseñas coinciden
    if ($password == $reppassword) {
        // Verifica si el usuario ya existe en la base de datos
        $check_user_query = "SELECT * FROM users WHERE user = $user";
        $stmt_check_user = $conexion->prepare($check_user_query);
        $stmt_check_user->bind_param(':user', $user);
        $stmt_check_user->execute();
        $result_check_user = $stmt_check_user->get_result();

        if ($result_check_user->num_rows > 0) {
            echo "El nombre de usuario ya está en uso";
        } else {
            // Hashea la contraseña para mayor seguridad
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Utiliza sentencias preparadas para evitar la inyección de SQL
            $insert_user_query = "INSERT INTO users (user, email, password) VALUES ($user, $email, $password)";
            $stmt_insert_user = $conexion->prepare($insert_user_query);
            $stmt_insert_user->bind_param("sss", $user, $email, $hashed_password);

            // Ejecuta la sentencia
            if ($stmt_insert_user->execute()) {
                // Registro completo, establece la sesión del usuario
                $_SESSION['user'] = $user;
                echo "Registro completo";
                header('Location: index.html');
                exit(); // Asegura que el script se detenga después de la redirección
            } else {
                echo "Registro fallido";
            }

            // Cierra la sentencia
            $stmt_insert_user->close();
        }

        // Cierra la sentencia
        $stmt_check_user->close();
    } else {
        echo "Las contraseñas no coinciden";
    }
}
?>
