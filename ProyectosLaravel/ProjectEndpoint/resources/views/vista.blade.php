<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo con AJAX</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-800 text-white">

    <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Prueba ajax</h1>

    <!-- Botón para enviar la petición AJAX -->
    <button id="cargarDatos"  class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">Cargar Datos</button>
    <div id="resultado" class="mb-4 text-lg font-normal text-gray-500 dark:text-gray-400" >

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
