<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu título</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @livewireStyles
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Asegura que el cuerpo ocupe al menos el 100% del viewport */
        }

        .content {
            flex: 1; /* Hace que este contenedor ocupe el espacio restante */
        }

      
    </style>
    
</head>
<body>
    @include('layouts.menu')

    <!-- Contenido principal de tu página -->
    <div class="content">
        <livewire:buscador-livewire />
    </div>

    <!-- Footer -->
    <footer class="footer">
        @include('layouts.footer')
    </footer>

    @livewireScripts

    <!-- Resto de tu código -->
</body>
</html>
