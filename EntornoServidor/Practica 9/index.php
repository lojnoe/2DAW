<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title> Practica 9</title>
    <link rel="shortcut icon" href="https://emojitool.com/img/apple/ios-14.2/polar-bear-2043.png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>


    </style>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-700 text-white">

    <h1 class="text-center text-6xl">-- Pelis --</h1>


    <?php

    // Asegúrate de tener el archivo de conexión incluido
    session_start();
    if (isset($_SESSION['iniciada'])) {
        function hacertabla()
        {
            require_once 'conexion.php';
            // Consulta SQL para obtener todos los registros de la tabla top_movies
            $sql = "SELECT id,title, director, year, cover_link,description FROM top_movies";
            $result = $conexion->query($sql);

            if ($result->num_rows > 0) {
                echo "<section class='container mx-auto p-6 font-mono text-white'>";
                echo "<div class='w-full mb-8 overflow-hidden rounded-lg shadow-lg'>";
                echo "<div class=''>";
                echo "<table class='w-full text-center items-center '>";
                echo "<thead>";
                echo "<tr class='text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600'>";
                echo "<th class='px-4 py-3'>ID</th>";
                echo "<th class='px-4 py-3'>Portada</th>";
                echo "<th class='px-4 py-3'>Titulo</th>";
                echo "<th class='px-4 py-3'>Director</th>";
                echo "<th class='px-4 py-3'>Año</th>";
                echo "<th class='px-4 py-3'>Descripcion</th>";
                echo "<th class='px-4 py-3'>Acciones</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody class='bg-white'>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr class='text-gray-700'>";
                    echo "<td class='px-4 py-3 text-ms font-semibold border'>" . $row['id'] . "</td>";
                    echo "<td class='px-4 py-3 border'>";
                    echo "<div class='flex items-center text-sm'>";
                    echo "<div class='relative md:block'>";
                    echo "<img class=' object-cover ' src='data:image/jpeg;base64," . base64_encode($row['cover_link']) . "' alt='' loading='lazy' />";
                    echo "<div class='absolute inset-0 rounded-full shadow-inner' aria-hidden='true'></div>";
                    echo "</div>";
                    echo "<div>";
                    echo "</div>";
                    echo "</div>";
                    echo "</td>";
                    echo "<td class='px-4 py-3 text-ms font-semibold border'>" . $row['title'] . "</td>";
                    echo "<td class='px-4 py-3 text-ms font-semibold border'>" . $row['director'] . "</td>";
                    echo "<td class='px-4 py-3 text-ms font-semibold border'>" . $row['year'] . "</td>";
                    echo "<td class='px-4 py-3 text-ms font-semibold border'>" . $row['description'] . "</td>";
                    echo "<td class='px-4 py-3 text-ms font-semibold border'> <form method='post' action='index.php'>
<input type='submit' name='editar' class=' text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800' value='Modificar'>
<input type='hidden' name='editarid' class='btn btn-primary btn-block mb-4 text-center' value=" . $row['id'] . ">
</form> 
<form method='POST' action='index.php' class='py-2'>
<input type='submit' name='eliminar' class=' text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800' value='Eliminar'>
<input type='hidden' name='elimiarid' class='btn btn-primary btn-block mb-4 text-center' value=" . $row['id'] . ">
</form>


</td>";
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
        }
    


    ?>

    <div class="w-25 mx-auto text-black text-xl text-white">
        <form method="post" action="index.php" enctype="multipart/form-data">
            <div class="form-outline mb-4">
                <h1 class="text-center text-4xl">Insertar pelicula</h1>
                <label class="form-label" for="user">Titulo</label>
                <input type="text" name="titulo" class="form-control" />
            </div>
            <div class="form-outline mb-4">
                <label class="form-label" for="director">Director</label>
                <input type="text" name="director" class="form-control" />
            </div>
            <div class="form-outline mb-4">
                <label class="form-label" for="año">Año</label>
                <input type="text" name="año" class="form-control" />
            </div>
            <div class="form-outline mb-4">
                <label class="form-label" for="descripcion">Descripcion</label>
                <input type="text" name="descripcion" class="form-control" />
            </div>
            <div class="form-outline mb-4">
                <label class="form-label" for="foto">Foto</label>
                <input type="file" name="fileToUpload" id="fileToUpload" class="form-control" />
            </div>
            <input type="submit" name="enviar" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"" value=" Enviar">
    </div>
    </form>
    </div>
    <?php
    // Asegúrate de tener el archivo de conexión incluido

    if (isset($_SESSION['iniciada'])) {
        if (isset($_POST['enviar']) && isset($_FILES["fileToUpload"])) {
            $titulo = $_POST['titulo'];
            $director = $_POST['director'];
            $año = $_POST['año'];
            $descripcion = $_POST['descripcion'];
    
            $servidor = "localhost";
            $usuario = "root";
            $pass = "";
            $basedatos = "practica";
    
            $conexion = mysqli_connect($servidor, $usuario, $pass) or die("Error de conexión");
    
            //Seleccionamos la Base de Datos
            mysqli_select_db($conexion, $basedatos);
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    
            // Asignar valores a los parámetros
            $contenidoArchivo = file_get_contents($_FILES["fileToUpload"]["tmp_name"]);
    
            $query = "INSERT INTO top_movies (title, director, year, cover_link, description) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conexion->prepare($query);
            $stmt->bind_param("sssss", $titulo, $director, $año, $contenidoArchivo, $descripcion);
            
            if ($stmt->execute()) {
                // Mover el archivo al directorio de destino
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    echo "La película se ha agregado con éxito.";
                } else {
                    echo "Hubo un error al subir el archivo.";
                }
            } else {
                echo "Error al ejecutar la consulta: " . $stmt->error;
            }
    
            $stmt->close();
            $conexion->close();
        }
}
        

        // Cerrar la conexión
        
        if (isset($_POST['eliminar'])) {
            $servidor = "localhost";
            $usuario = "root";
            $pass = "";
            $basedatos = "practica";

            //Establecer la conexión con MySQL
            $conexion = mysqli_connect($servidor, $usuario, $pass) or die("Error de conexión");

            //Seleccionamos la Base de Datos
            mysqli_select_db($conexion, $basedatos);
            $eliminarid = $_POST['elimiarid'];
            $query = "DELETE FROM top_movies WHERE id = ?";
            $stmt = $conexion->prepare($query);
            $stmt->bind_param("i", $eliminarid);
            $stmt->execute();
            $stmt->close();
            $conexion->close();
        }
        if (isset($_POST['editar'])) {


    ?>
            <div class="w-25 py-5 mx-auto text-white">
                <form method="post" action="index.php">
                    <div class="form-outline mb-4">
                        <h1 class="text-center text-4xl">Modificar pelicula</h1>
                        <label class="form-label" for="user">Titulo</label>
                        <input type="text" name="nuevaid" class="form-control" />
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="descripcion">Descripcion</label>
                        <input type="text" name="nuevadescripcion" class="form-control" />
                    </div>
                    <input type="hidden" name="idbusqueda" value="<?php echo $_POST['editarid']; ?>">
                    <input type="submit" name="modificar" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"" value=" Enviar">


            </div>

    <?php
        }
        if (isset($_POST['modificar'])) {
            $servidor = "localhost";
            $usuario = "root";
            $pass = "";
            $basedatos = "practica";
            $nuevonombre = $_POST['nuevaid'];
            $nuevadescripcion = $_POST['nuevadescripcion'];

            //Establecer la conexión con MySQL
            $conexion = mysqli_connect($servidor, $usuario, $pass) or die("Error de conexión");

            //Seleccionamos la Base de Datos
            mysqli_select_db($conexion, $basedatos);
            $idbusqueda = $_POST['idbusqueda'];

            $query = "UPDATE top_movies SET title = ?, description = ? WHERE id = ?";
            $stmt = $conexion->prepare($query);
            $stmt->bind_param("ssi", $nuevonombre, $nuevadescripcion, $idbusqueda);
            $stmt->execute();
            $stmt->close();
            $conexion->close();
        }
    

    }else {
            header('Location: login.html');
        }
    ?>
    <section class="text-center">
        <form action="logout.php" method="post">
            <input type="submit" name="logout" value="Logout" class='text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800'>
        </form>
    </section>
    <div id="tabla">
        <?php
        echo hacertabla();
        ?>
    </div>
</body>

</html>