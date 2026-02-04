<div class="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900">
    <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-2xl w-96">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800 dark:text-white">Iniciar Sesión</h2>
        <form wire:submit="login">
            <div class="mb-4">
                <flux:field>
                    <flux:label class="text-gray-700 dark:text-gray-300">Email</flux:label>
                    <flux:input wire:model="email" icon="envelope" type="email" placeholder="Your Email"
                        class="border-gray-300 dark:border-gray-600 text-black dark:text-white dark:bg-gray-700 focus:border-blue-500" />
                    <flux:error name="email" />
                </flux:field>
            </div>
            <div class="mb-4">
                <flux:field>
                    <flux:label class="text-gray-700 dark:text-gray-300">Password</flux:label>
                    <flux:input wire:model="password" icon="lock-closed" type="password" placeholder="Your password"
                        class="border-gray-300 dark:border-gray-600 text-black dark:text-white dark:bg-gray-700 focus:border-blue-500" />
                    <flux:error name="password" />
                </flux:field>
            </div>
            <div class="mb-6">
                {{-- <label class="flex items-center">
                    <input type="checkbox" wire:model="remember" class="mr-2">
                    <span class="text-gray-700 dark:text-gray-300">Recordarme</span>
                </label> --}}
            </div>
            <button type="submit"
                class="w-full cursor-pointer bg-linear-to-r from-blue-500 via-blue-600 to-indigo-600 hover:from-blue-600 hover:via-blue-700 hover:to-indigo-700 text-white py-2 rounded-lg transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105"
                wire:loading.attr="disabled">
                <span wire:loading.remove>Iniciar Sesión</span>
                <span wire:loading>Procesando...</span>
            </button>
        </form>
        <p class="mt-4 text-center text-gray-600 dark:text-gray-400">
            ¿No tienes cuenta?
            <a href="/registro" wire:navigate class="text-blue-500 hover:underline">Regístrate</a>
        </p>
    </div>
</div>