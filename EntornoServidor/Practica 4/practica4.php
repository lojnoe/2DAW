<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <title> Practica 4</title>
  <link rel="shortcut icon" href="https://emojitool.com/img/apple/ios-14.2/polar-bear-2043.png">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</head>
<body class="bg-dark text-white">
    <h1 class="text-center">Menu de archivos</h1>

    <div class="container mx-auto w-25 text-center">
    <?php
        $admin = array('user'=>'admin','password'=>'1234');
        if (isset($_GET['mostrardirectorio'])) {
            echo "Directorio ";
            echo "<br>";
            echo getcwd();
        }
        if (isset($_GET['search'])) {
            $fichero = $_GET['fichero'];
            foreach (glob("*" . $fichero . "*") as $filename) {
                echo $filename . "<br>";
            }
        }

        if(isset($_GET['escribir'])){
            $comentario = $_GET['comentario'];
            $miarchivo = fopen("archivo.txt", "w+");
            fwrite($miarchivo, $comentario);

            $todo = file_get_contents("archivo.txt");
            echo "<p>Contenido del archivo: <br/> ".$todo."</p>";
            fclose($miarchivo);
        }

        if(isset($_POST["login"])){
            if($_POST['user'] == $admin['user'] && $_POST['password'] == $admin['password']){
                $fecha = date('d/m/y  h:i:s');
                echo "Fecha de inicio de sesion: ".$fecha;

    ?>

            <form action="practica4.php" method="GET" class="text-center">
                <input type="hidden" name="loginOk">
                <br>
                <input type="submit" name="mostrardirectorio" value="Directorio" class='btn btn-primary btn-block mb-4 text-center'>
                
            </form>
            <form action="practica4.php" method="get">
                    <h3>Buscar Fichero</h3>
                    <input type="text" name="fichero">
                    <br>
                    <br>
                    <input type="submit" name="search" value="Buscar Fichero" class='btn btn-primary btn-block mb-4 text-center'>
            
            </form>
            <form action="practica4.php" method="get">
                    <h3>Escribir en fichero</h3>
                    <input type="text" name="comentario">
                    <br>
                    <br>
                    <input type="submit" name="escribir" value="Escribir" class='btn btn-primary btn-block mb-4 text-center'>
            </form>
    <?php
           
         }else{
            echo "Datos incorrectos";
        }
    }
?>
    </div>
    
</body>
</html>

