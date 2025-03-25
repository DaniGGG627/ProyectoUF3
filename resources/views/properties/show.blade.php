@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-lg mt-10">
        <!-- Título de la propiedad -->
        <h1 class="text-3xl font-semibold text-gray-800 mb-4">{{ $property->title }}</h1>

        <!-- Descripción -->
        <p class="text-gray-700 mb-4">{{ $property->description }}</p>

        <!-- Precio -->
        <p class="text-lg font-bold text-gray-800 mb-4">{{ $property->price }} €</p>

        <!-- Ubicación -->
        <p class="text-gray-700 mb-6">{{ $property->location }}</p>

        <!-- Formulario para agregar valoración -->
        @if(Auth::check())
            <div class="bg-gray-50 p-6 rounded-lg shadow-md mb-6">
                <h3 class="text-2xl font-semibold text-gray-800 mb-4">Deja tu valoración</h3>
                <form action="{{ route('ratings.store', $property->id) }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="rating" class="block text-gray-700 text-lg font-medium mb-2">Tu valoración:</label>
                        <select name="rating" required class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="1">1 estrella</option>
                            <option value="2">2 estrellas</option>
                            <option value="3">3 estrellas</option>
                            <option value="4">4 estrellas</option>
                            <option value="5">5 estrellas</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="comment" class="block text-gray-700 text-lg font-medium mb-2">Comentario:</label>
                        <textarea name="comment" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                    </div>

                    <button type="submit" class="w-full py-3 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200">
                        Enviar Valoración
                    </button>
                </form>
            </div>
        @endif

        <!-- Valoraciones existentes -->
        <h3 class="text-2xl font-semibold text-gray-800 mb-4">Valoraciones:</h3>
        @if($property->ratings->isNotEmpty())
            <div class="space-y-4">
                @foreach($property->ratings as $rating)
                    <div class="bg-gray-50 p-4 rounded-lg shadow-sm">
                        <p class="font-semibold text-gray-800">{{ $rating->user->name }}: <span class="text-yellow-500">{{ $rating->rating }} estrellas</span></p>
                        <p class="text-gray-700">{{ $rating->comment }}</p>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-500">No hay valoraciones disponibles para esta propiedad.</p>
        @endif
    </div>
@endsection
