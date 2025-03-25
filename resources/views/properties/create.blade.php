
@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-lg mt-10">
        <h1 class="text-3xl font-semibold text-center text-gray-800 mb-8">Crear Nueva Propiedad</h1>

        <form action="{{ route('properties.store') }}" method="POST">
            @csrf
            <div class="mb-6">
                <label for="title" class="block text-gray-700 text-lg font-medium mb-2">Título</label>
                <input type="text" name="title" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="title" required>
            </div>

            <div class="mb-6">
                <label for="description" class="block text-gray-700 text-lg font-medium mb-2">Descripción</label>
                <textarea name="description" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="description" required></textarea>
            </div>

            <div class="mb-6">
                <label for="price" class="block text-gray-700 text-lg font-medium mb-2">Precio</label>
                <input type="number" name="price" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="price" required>
            </div>

            <div class="mb-6">
                <label for="type" class="block text-gray-700 text-lg font-medium mb-2">Tipo</label>
                <select name="type" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="type" required>
                    <option value="sale">Venta</option>
                    <option value="rent">Alquiler</option>
                </select>
            </div>

            <div class="mb-6">
                <label for="location" class="block text-gray-700 text-lg font-medium mb-2">Ubicación</label>
                <input type="text" name="location" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="location" required>
            </div>

            <button type="submit" class="w-full py-3 bg-green-500 text-white font-semibold rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-200">Crear Propiedad</button>
        </form>
    </div>
@endsection
