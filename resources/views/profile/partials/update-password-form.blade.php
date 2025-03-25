<form method="POST" action="{{ route('password.update') }}" class="space-y-6">
    @csrf
    @method('PUT')

    <!-- Campo para la contraseña actual -->
    <div>
        <x-input-label for="current_password" :value="__('Current Password')" />
        <x-text-input id="current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" required />
        <x-input-error class="mt-2" :messages="$errors->updatePassword->get('current_password')" />
    </div>

    <!-- Campo para la nueva contraseña -->
    <div>
        <x-input-label for="password" :value="__('New Password')" />
        <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" required />
        <x-input-error class="mt-2" :messages="$errors->updatePassword->get('password')" />
    </div>

    <!-- Campo para confirmar la nueva contraseña -->
    <div>
        <x-input-label for="password_confirmation" :value="__('Confirm New Password')" />
        <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" required />
        <x-input-error class="mt-2" :messages="$errors->updatePassword->get('password_confirmation')" />
    </div>

    <!-- Botón para guardar -->
    <div>
        <x-primary-button>{{ __('Save') }}</x-primary-button>
    </div>
</form>
