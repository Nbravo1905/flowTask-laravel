<div class="min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-2xl w-96">
        <h2 class="text-2xl font-bold mb-6 text-center">Registro</h2>

        <form wire:submit="register">
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Nombre</label>
                <input type="text" wire:model="name"
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500 text-gray-500">
                @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Email</label>
                <input type="email" wire:model="email"
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500 text-gray-500">
                @error('email')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Contraseña</label>
                <input type="password" wire:model="password"
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500 text-gray-500">
                @error('password')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 mb-2">Confirmar Contraseña</label>
                <input type="password" wire:model="password_confirmation"
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500 text-gray-500">
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition"
                wire:loading.attr="disabled">
                <span wire:loading.remove>Registrarse</span>
                <span wire:loading>Procesando...</span>
            </button>
        </form>

        <p class="mt-4 text-center text-gray-600">
            ¿Ya tienes cuenta?
            <a href="/login" wire:navigate class="text-blue-500 hover:underline">Inicia sesión</a>
        </p>
    </div>
</div>