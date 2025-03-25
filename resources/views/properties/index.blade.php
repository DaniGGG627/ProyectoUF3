<!-- resources/views/properties/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto p-6 mt-10">
        <h1 class="text-3xl font-semibold text-gray-800 mb-8">Listado de Propiedades</h1>

        @if($properties->isEmpty())
            <p class="text-center text-gray-500">No hay propiedades disponibles.</p>
        @else
            <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="py-3 px-6 text-left text-gray-700 font-medium">Título</th>
                        <th class="py-3 px-6 text-left text-gray-700 font-medium">Precio</th>
                        <th class="py-3 px-6 text-left text-gray-700 font-medium">Ubicación</th>
                        <th class="py-3 px-6 text-left text-gray-700 font-medium">Tipo</th>
                        <th class="py-3 px-6 text-left text-gray-700 font-medium">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($properties as $property)
                        <tr class="border-b border-gray-200">
                            <td class="py-4 px-6 text-gray-800">{{ $property->title }}</td>
                            <td class="py-4 px-6 text-gray-800">${{ number_format($property->price, 2) }}</td>
                            <td class="py-4 px-6 text-gray-800">{{ $property->location }}</td>
                            <td class="py-4 px-6 text-gray-800">{{ ucfirst($property->type) }}</td>
                            <td class="py-4 px-6 flex space-x-2">
                                <a href="{{ route('properties.show', $property->id) }}" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 transition duration-200">Ver</a>

                                @if(Auth::user()->role == 'admin')
                                    <a href="{{ route('properties.edit', $property->id) }}" class="px-4 py-2 bg-yellow-500 text-white font-semibold rounded-md hover:bg-yellow-600 transition duration-200">Editar</a>

                                    <form action="{{ route('properties.destroy', $property->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-4 py-2 bg-red-500 text-white font-semibold rounded-md hover:bg-red-600 transition duration-200">Eliminar</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
