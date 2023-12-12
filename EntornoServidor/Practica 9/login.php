<?php
session_start();

if (isset($_POST['login'])) {
    require_once 'conexion.php';

    $username = $_POST['user'];
    $password = $_POST['password'];

    // Verifica las credenciales en la base de datos
    $query = "SELECT * FROM users WHERE name = ? AND password = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Inicio de sesión exitoso
        $_SESSION['username'] = $username;
        header('Location: index.php');
        exit();
    } else {
        // Credenciales incorrectas
        echo "Usuario o contraseña incorrectos";
    }

    $stmt->close();
    $conexion->close();
}
?>
