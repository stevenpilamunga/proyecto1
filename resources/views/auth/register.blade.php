<x-guest-layout>
    <div class="login-container futuristic">
        <h2>Registrarse</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label for="name">Nombre de Usuario</label>
                <input type="text" id="name" name="name" required autofocus class="block mt-1 w-full bg-gray-800 text-white rounded-md border-none" :value="old('name')" autocomplete="name">
                <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500" />
            </div>

            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" id="email" name="email" required class="block mt-1 w-full bg-gray-800 text-white rounded-md border-none" :value="old('email')" autocomplete="username">
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" required class="block mt-1 w-full bg-gray-800 text-white rounded-md border-none" autocomplete="new-password">
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirmar Contraseña</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required class="block mt-1 w-full bg-gray-800 text-white rounded-md border-none" autocomplete="new-password">
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500" />
            </div>

            <div style="text-align: center;">
                <button type="submit" class="login-button futuristic-button">Registrarse</button>
            </div>
        </form>

        <div class="login-info">
            <p>¿Ya tienes una cuenta? <a href="{{ route('login') }}">Inicia sesión aquí</a></p>
        </div>
    </div>
</x-guest-layout>
