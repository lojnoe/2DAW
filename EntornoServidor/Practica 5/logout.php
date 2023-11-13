<?php
//inicia la sesión para acceder a las variables almacenadas
session_start();
//destruye las variables de sesión
session_destroy();
//redireccióna al index donde esta nuestro login para acceder al sistema
header("Location:index.html");


/**
 *  Cookie vs Session 
 * Las cookies son pequeños fragmentos de datos que se almacenan en el navegador del usuario. 
 * Estos datos son enviados por el servidor web y luego devueltos por el navegador en solicitudes posteriores. 
 * Las cookies son útiles para almacenar información persistente en el lado del cliente, como preferencias de usuario, datos de inicio de sesión, etc.
 * 
 * Las sesiones son una forma de mantener la información del usuario a lo largo de múltiples páginas web durante una visita. 
 * A diferencia de las cookies, la información de la sesión se almacena en el servidor, y solo se envía un identificador único de sesión al cliente.
 * 
 * 
 * He utilizado las sessiones ya que por tema de seguridad es mucho mas seguro porque se almacenan en el servidor en vez del navegador.
 * 
 */
