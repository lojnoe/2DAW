<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <script src="https://cdn.tailwindcss.com"></script>
        
    </head>
    <body>
        <div class="max-w-md mx-auto px-4">
            <h1 class="text-2xl text-center my-8">
                Administración de productos
            </h1>

            @yield('content')
        </div>
    </body>
 </html>
