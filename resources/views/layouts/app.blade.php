<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script src="//unpkg.com/alpinejs" defer></script>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tu Aplicación</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}"> <!-- O tu ruta CSS -->
</head>
<body>
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation-menu')
 <!-- Incluye tu menú de navegación -->
        <main>
            @yield('content') <!-- Aquí se mostrará el contenido de las vistas -->
        </main>
    </div>
</body>
</html>
