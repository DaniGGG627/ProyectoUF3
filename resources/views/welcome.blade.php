<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestora Inmobiliaria</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <!-- Contenedor Principal -->
    <div class="min-h-screen flex items-center justify-center bg-blue-50">

        <!-- Contenido Central -->
        <div class="text-center bg-white p-8 rounded-lg shadow-lg w-96">

            <!-- Título -->
            <h1 class="text-4xl font-semibold text-blue-600 mb-6">Gestora Inmobiliaria</h1>

            <!-- Descripción -->
            <p class="text-gray-600 mb-6">Conéctate con los mejores inmuebles para comprar, vender o alquilar. Regístrate o inicia sesión para empezar.</p>

            <!-- Botones de Registro y Login -->
            <div class="flex justify-center space-x-4">
                <a href="{{ route('register') }}" class="inline-block px-6 py-3 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition duration-300">
                    Registro
                </a>
                <a href="{{ route('login') }}" class="inline-block px-6 py-3 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition duration-300">
                    Login
                </a>
            </div>

        </div>

    </div>

</body>

</html>
