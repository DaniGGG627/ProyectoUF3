@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-lg mt-10">
        <h1 class="text-3xl font-semibold text-center text-gray-800 mb-8">{{ __('Editar Perfil') }}</h1>

        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PATCH')

            <!-- Nombre -->
            <div class="mb-6">
                <label for="name" class="block text-gray-700 text-lg font-medium mb-2">{{ __('Nombre') }}</label>
                <input type="text" name="name" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="name" value="{{ old('name', $user->name) }}" required>
            </div>

            <!-- Correo Electrónico -->
            <div class="mb-6">
                <label for="email" class="block text-gray-700 text-lg font-medium mb-2">{{ __('Correo Electrónico') }}</label>
                <input type="email" name="email" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="email" value="{{ old('email', $user->email) }}" required>
            </div>

            <!-- Botón de actualización -->
            <button type="submit" class="w-full py-3 bg-yellow-500 text-white font-semibold rounded-md hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 transition duration-200">{{ __('Actualizar Perfil') }}</button>
        </form>
    </div>

    <div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-lg mt-10">
        <h1 class="text-3xl font-semibold text-center text-gray-800 mb-8">{{ __('Actualizar Contraseña') }}</h1>

        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Contraseña Actual -->
            <div class="mb-6">
                <label for="current_password" class="block text-gray-700 text-lg font-medium mb-2">{{ __('Contraseña Actual') }}</label>
                <input type="password" name="current_password" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="current_password" required>
            </div>

            <!-- Nueva Contraseña -->
            <div class="mb-6">
                <label for="password" class="block text-gray-700 text-lg font-medium mb-2">{{ __('Nueva Contraseña') }}</label>
                <input type="password" name="password" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="password" required>
            </div>

            <!-- Confirmar Nueva Contraseña -->
            <div class="mb-6">
                <label for="password_confirmation" class="block text-gray-700 text-lg font-medium mb-2">{{ __('Confirmar Nueva Contraseña') }}</label>
                <input type="password" name="password_confirmation" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="password_confirmation" required>
            </div>

            <!-- Botón de actualización -->
            <button type="submit" class="w-full py-3 bg-yellow-500 text-white font-semibold rounded-md hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 transition duration-200">{{ __('Actualizar Contraseña') }}</button>
        </form>
    </div>

    <div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-lg mt-10">
        <h1 class="text-3xl font-semibold text-center text-gray-800 mb-8">{{ __('Eliminar Cuenta') }}</h1>

        <form action="{{ route('profile.destroy') }}" method="POST">
            @csrf
            @method('DELETE')

            <!-- Contraseña para eliminar cuenta -->
            <div class="mb-6">
                <label for="password" class="block text-gray-700 text-lg font-medium mb-2">{{ __('Contraseña') }}</label>
                <input type="password" name="password" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="password" required>
            </div>

            <!-- Botones de acción -->
            <div class="flex justify-end gap-4">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancelar') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Eliminar Cuenta') }}
                </x-danger-button>
            </div>
        </form>
    </div>
@endsection
