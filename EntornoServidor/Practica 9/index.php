<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <title> Practica 9</title>
  <link rel="shortcut icon" href="https://emojitool.com/img/apple/ios-14.2/polar-bear-2043.png">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
    <style>
        img{
            width: 200px;
            height: 250px;
        }
    </style>
</head>
<body>
    <h1 class="text-center">-- Pelis --</h1>
</body>
</html>


<?php
require_once 'conexion.php'; // Asegúrate de tener el archivo de conexión incluido

// Consulta SQL para obtener todos los registros de la tabla top_movies
$sql = "SELECT title, director, year, cover_link FROM top_movies";
$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    echo "<section class='container mx-auto p-6 font-mono'>";
    echo "<div class='w-full mb-8 overflow-hidden rounded-lg shadow-lg'>";
    echo "<div class='w-full overflow-x-auto'>";
    echo "<table class='w-full text-center items-center '>";
    echo "<thead>";
    echo "<tr class='text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600'>";
    echo "<th class='px-4 py-3'>Portada</th>";
    echo "<th class='px-4 py-3'>Titulo</th>";
    echo "<th class='px-4 py-3'>Director</th>";
    echo "<th class='px-4 py-3'>Año</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody class='bg-white'>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr class='text-gray-700'>";
        echo "<td class='px-4 py-3 border'>";
        echo "<div class='flex items-center text-sm'>";
        echo "<div class='relative w-8 h-8 mr-3 rounded-full md:block'>";
        echo "<img class=' object-cover w-12  rounded-full' src='data:image/jpeg;base64," . base64_encode($row['cover_link']) . "' alt='' loading='lazy' />";
        echo "<div class='absolute inset-0 rounded-full shadow-inner' aria-hidden='true'></div>";
        echo "</div>";
        echo "<div>";
        echo "</div>";
        echo "</div>";
        echo "</td>";
        echo "<td class='px-4 py-3 text-ms font-semibold border'>" . $row['title'] . "</td>";
        echo "<td class='px-4 py-3 text-ms font-semibold border'>" . $row['director'] . "</td>";
        echo "<td class='px-4 py-3 text-ms font-semibold border'>" . $row['year'] . "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
    echo "</div>";
    echo "</div>";
    echo "</section>";
} else {
    echo "No se encontraron películas.";
}

// Cerrar la conexión
$conexion->close();
?>
