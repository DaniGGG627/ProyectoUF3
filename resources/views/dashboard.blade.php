@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto p-6 mt-10">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Bienvenido a tu Dashboard</h1>

        @if (Auth::user()->role == 'admin')
            <div class="bg-blue-100 border-l-4 border-blue-500 p-4 mb-6">
                <h4 class="text-xl font-semibold text-blue-700">Bienvenido, Admin!</h4>
                <p class="text-gray-700">Puedes gestionar las propiedades y los usuarios.</p>
                <div class="mt-4 flex space-x-4">
                    <!-- Botón para crear una nueva propiedad -->
                    <a href="{{ route('properties.create') }}" class="px-6 py-2 bg-green-500 text-white font-semibold rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-200">Crear Nueva Propiedad</a>
                    <!-- Botón para gestionar propiedades -->
                    <a href="{{ route('properties.index') }}" class="px-6 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200">Gestionar Propiedades</a>
                </div>
            </div>
        @else
            <div class="bg-green-100 border-l-4 border-green-500 p-4 mb-6">
                <h4 class="text-xl font-semibold text-green-700">Bienvenido, {{ Auth::user()->name }}!</h4>
                <p class="text-gray-700">Puedes explorar las propiedades y dejarnos tus valoraciones.</p>
                <div class="mt-4">
                    <a href="{{ route('properties.create') }}" class="px-6 py-2 bg-green-500 text-white font-semibold rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-200">Crear Nueva Propiedad</a>
                    <a href="{{ route('properties.index') }}" class="px-6 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200">Ver Propiedades</a>
                </div>
            </div>
        @endif
    </div>
@endsection
