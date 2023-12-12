<?php
require_once 'conexion.php'; // Asegúrate de tener el archivo de conexión incluido

// Consulta SQL para obtener todos los registros de la tabla top_movies
$sql = "SELECT title, director, year, cover_link FROM top_movies";
$result = $conexion->query($sql);

// Verificar si hay resultados
if ($result->num_rows > 0) {
    // Mostrar la información de cada película
    while ($row = $result->fetch_assoc()) {
        echo "Título: " . $row['title'] . "<br>";
        echo "Director: " . $row['director'] . "<br>";
        echo "Año: " . $row['year'] . "<br>";
        echo "Portada: <img style='heigth:200px; width:200px;'src='data:image/jpeg;base64," . base64_encode($row['cover_link']) . "' alt='Portada'> <br>";
        echo "<hr>";
    }
} else {
    echo "No se encontraron películas.";
}

// Cerrar la conexión
$conexion->close();
?>
