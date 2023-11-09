<?php
//inicia la sesión para acceder a las variables almacenadas
session_start();
//destruye las variables de sesión
session_destroy();
//redireccióna al index donde esta nuestro login para acceder al sistema
header("Location:index.html");
?>