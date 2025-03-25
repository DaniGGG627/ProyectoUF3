<form method="POST" action="{{ route('profile.destroy') }}" class="space-y-6">
    @csrf
    @method('DELETE')

    <!-- Campo para la contraseña -->
    <div>
        <x-input-label for="password" :value="__('Password')" />
        <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" required />
        <x-input-error class="mt-2" :messages="$errors->userDeletion->get('password')" />
    </div>

    <!-- Botón para eliminar cuenta -->
    <div class="flex justify-end gap-4">
        <x-secondary-button x-on:click="$dispatch('close')">
            {{ __('Cancel') }}
        </x-secondary-button>

        <x-danger-button class="ms-3">
            {{ __('Delete Account') }}
        </x-danger-button>
    </div>
</form>
