<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <title> Practica 5</title>
  <link rel="shortcut icon" href="https://emojitool.com/img/apple/ios-14.2/polar-bear-2043.png">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</head>
<body class="bg-dark text-white">
    <h1 class="text-center">Menu de archivos</h1>

    <div class="container mx-auto w-25 text-center">
    <?php
        session_start();
        
            if(isset($_SESSION['iniciada']) && $_SESSION['user_id'] == "admin"){

            
            ?>

            <form action="index.php" method="GET" class="text-center">
                <div class="flex items-center gap-4 justify-center mt-8">
                    <?php
                    // Imprime el nombre de usuario ademas de la fecha y hora almacenada en la variable de sesión
                    echo "Usuario ".$_SESSION['user_id']." Se ha logeado a " . $_SESSION['login_time'];
                    ?>
                </div>
                <input type="hidden" name="loginOk">
                <br>
                <input type="submit" name="mostrardirectorio" value="Directorio" class='btn btn-primary btn-block mb-4 text-center'>
                <div class="flex flex-col items-center gap-4 justify-center mt-8">
                    <?php
                    //si se ha utilizado el formulario para mostrar el directorio actual
                    if (isset($_GET['mostrardirectorio'])) {
                            echo "Directorio ";
                            echo "<br>";
                            echo getcwd();
                        }
                    ?>
                </div>
                
            </form>
            <form action="index.php" method="get">
                    <h3>Buscar Fichero</h3>
                    <input type="text" name="fichero">
                    <br>
                    <br>
                    <input type="submit" name="search" value="Buscar Fichero" class='btn btn-primary btn-block mb-4 text-center'>
            <div class="flex flex-col items-center gap-4 justify-center mt-8">
                    <?php
                    //si se ha utilizdo el formulario para buscar ficheros ejecuta el siguiente codigo
                    if (isset($_GET['search'])) {
                        //linea de texto para dar mas información
                        echo "Los ficheros que cumplen esos criterios son: <br>";
                        //foreach para mostrar todos los archivos que cumplan el regex de contener la palabra que le indicamos por el formulario
                        // al ser *(cualquier cosa), $_GET['fichero'] (parametro pasado por formulario) y de nuevo *(cualquier cosa)
                        foreach (glob("*" . $_GET['fichero'] . "*") as $filename) {
                            echo $filename . "<br>";
                        }
                    }
                    ?>
                </div>
            </form>
            <form action="index.php" method="get">
                    <h3>Escribir en fichero</h3>
                    <input type="text" name="comentario">
                    <br>
                    <br>
                    <input type="submit" name="escribir" value="Escribir" class='btn btn-primary btn-block mb-4 text-center'>
                    
            </form>
            <div class="flex flex-col items-center gap-4 justify-center mt-8">
                    <?php
                    if(isset($_GET['escribir'])){
                                $comentario = $_GET['comentario'];
                                $miarchivo = fopen("archivo.txt", "w+");
                                fwrite($miarchivo, $comentario);

                                $todo = file_get_contents("archivo.txt");
                                echo "<p>Contenido del archivo: <br/> ".$todo."</p>";
                                fclose($miarchivo);
                            }
                    
                    ?>
                </div>
        <!-- formulario para logout y destruir la sesión actual -->
                <form method="post" action="logout.php">
                    <div class="flex items-center gap-4 justify-end mt-8">
                        <input type="submit" name="logout" value="Logout" class='btn btn-primary btn-block mb-4 text-center'>
                    </div>
                </form>
                <?php
                
            }elseif(isset($_SESSION['iniciada']) && $_SESSION['user_id'] == "Cliente1"){
                
                ?>
                <form action="index.php" method="GET" class="text-center">
                <div class="flex items-center gap-4 justify-center mt-8">
                    <?php
                    // Imprime el nombre de usuario ademas de la fecha y hora almacenada en la variable de sesión
                    echo "Usuario ".$_SESSION['user_id']." Se ha logeado a " . $_SESSION['login_time']
                    ?>
                </div>
                <input type="hidden" name="loginOk">
                <br>
                <input type="submit" name="mostrardirectorio" value="Directorio" class='btn btn-primary btn-block mb-4 text-center'>
                <div class="flex flex-col items-center gap-4 justify-center mt-8">
                    <?php
                    //si se ha utilizado el formulario para mostrar el directorio actual
                    if (isset($_GET['mostrardirectorio'])) {
                            echo "Directorio ";
                            echo "<br>";
                            echo getcwd();
                        }
                    ?>
                </div>
                
            </form>
            <form action="index.php" method="get">
                    <h3>Buscar Fichero</h3>
                    <input type="text" name="fichero">
                    <br>
                    <br>
                    <input type="submit" name="search" value="Buscar Fichero" class='btn btn-primary btn-block mb-4 text-center'>
            <div class="flex flex-col items-center gap-4 justify-center mt-8">
                    <?php
                    //si se ha utilizdo el formulario para buscar ficheros ejecuta el siguiente codigo
                    if (isset($_GET['search'])) {
                        //linea de texto para dar mas información
                        echo "Los ficheros que cumplen esos criterios son: <br>";
                        //foreach para mostrar todos los archivos que cumplan el regex de contener la palabra que le indicamos por el formulario
                        // al ser *(cualquier cosa), $_GET['fichero'] (parametro pasado por formulario) y de nuevo *(cualquier cosa)
                        foreach (glob("*" . $_GET['fichero'] . "*") as $filename) {
                            echo $filename . "<br>";
                        }
                    }
                    ?>
                </div>
            </form>
            <form action="index.php" method="get">
                    <h3>Leer fichero</h3>
                    <br>
                    <br>
                    <input type="submit" name="escribir" value="Leer fichero" class='btn btn-primary btn-block mb-4 text-center'>
                    
            </form>
            <div class="flex flex-col items-center gap-4 justify-center mt-8">
                    <?php
                    if(isset($_GET['escribir'])){
                                //IMPORTANTE EL FICHERO comentarios.txt DEBE EXISTIR PARA PODER ABRIRLO SI NO DARA FALLO
                        //como solo tiene permisos de lectura lo abrimo con r solo dandole solo esos permisos 
                        $archivo = fopen("archivo.txt", "r");
                        //cerramos el fichero
                        fclose($archivo);
                        //con esto mostramos el contenido del documento
                        $completo = file_get_contents("archivo.txt");
                        //linea de texto para dar mas información
                        echo "La información del fichero es: <br>";
                        //imprimir el contenido almazenado en la variable con todo el documento
                        echo $completo;
                            }
                    
                    ?>
                </div>
        <!-- formulario para logout y destruir la sesión actual -->
                <form method="post" action="logout.php">
                    <div class="flex items-center gap-4 justify-end mt-8">
                        <br>
                        <br>
                        <input type="submit" name="logout" value="Logout" class='btn btn-primary btn-block mb-4 text-center'>
                    </div>
                </form>
            <?php
            }else{
                header("Location:index.html");
            }
            ?>
    </div>
    
</body>
</html>

