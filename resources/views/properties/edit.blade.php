<!-- resources/views/properties/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-lg mt-10">
        <h1 class="text-3xl font-semibold text-center text-gray-800 mb-8">Editar Propiedad: {{ $property->title }}</h1>

        <form action="{{ route('properties.update', $property->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <!-- Título -->
            <div class="mb-6">
                <label for="title" class="block text-gray-700 text-lg font-medium mb-2">Título</label>
                <input type="text" name="title" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="title" value="{{ $property->title }}" required>
            </div>

            <!-- Descripción -->
            <div class="mb-6">
                <label for="description" class="block text-gray-700 text-lg font-medium mb-2">Descripción</label>
                <textarea name="description" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="description" required>{{ $property->description }}</textarea>
            </div>

            <!-- Precio -->
            <div class="mb-6">
                <label for="price" class="block text-gray-700 text-lg font-medium mb-2">Precio</label>
                <input type="number" name="price" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="price" value="{{ $property->price }}" required>
            </div>

            <!-- Tipo -->
            <div class="mb-6">
                <label for="type" class="block text-gray-700 text-lg font-medium mb-2">Tipo</label>
                <select name="type" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="type" required>
                    <option value="sale" {{ $property->type == 'sale' ? 'selected' : '' }}>Venta</option>
                    <option value="rent" {{ $property->type == 'rent' ? 'selected' : '' }}>Alquiler</option>
                </select>
            </div>

            <!-- Ubicación -->
            <div class="mb-6">
                <label for="location" class="block text-gray-700 text-lg font-medium mb-2">Ubicación</label>
                <input type="text" name="location" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="location" value="{{ $property->location }}" required>
            </div>

            <!-- Botón de actualización -->
            <button type="submit" class="w-full py-3 bg-yellow-500 text-white font-semibold rounded-md hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 transition duration-200">Actualizar Propiedad</button>
        </form>
    </div>
@endsection
