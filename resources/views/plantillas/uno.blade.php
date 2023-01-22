<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Tailwind CSS (porque laravel funciona con este framework)-->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Sweetalert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer">    
    <title>@yield('titulo')</title> <!--todo lo que lleve un a @ indica que es una etiqueta de blade (el motor de laravel)-->
</head>
<body style="background-color: lightcyan">

    <h3 class="my-2 text-center text-lg">@yield('cabecera')</h3> <!--mediante las etiquetas de blade (motor plantilla laravel) puedo personalizar la plantilla para cada página-->
    <div class="container mx-auto">
        @yield('contenido')
    </div>
    @yield('js')

</body>
</html>
