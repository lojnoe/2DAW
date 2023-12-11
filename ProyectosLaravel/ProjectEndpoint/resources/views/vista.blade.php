<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo con AJAX</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>

    <h1>Prueba ajax</h1>

    <!-- Botón para enviar la petición AJAX -->
    <button id="cargarDatos">Cargar Datos</button>
    <div id="resultado"> <!-- Corrección: eliminé el signo de numeral (#) -->

    </div>
    <script>
        $(document).ready(function() {
            $('#cargarDatos').click(function() {
                $.ajax({
                    type: 'GET',
                    url: 'http://127.0.0.1:8000/dameanimal', // La ruta del controlador
                    success: function(response) {
                        // Corrección: ajusté la sintaxis para asignar el valor a #resultado
                        $('#resultado').html('Respuesta del servidor: ' + response.datos);

                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>

</body>
</html>
