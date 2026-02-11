<div class="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-zinc-900">
    <div class="bg-white dark:bg-zinc-800 p-8 rounded-lg shadow-xl w-full max-w-2xl border border-zinc-200 dark:border-zinc-700">
        <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-white">Editar Perfil</h2>

        @if (session('success'))
            <flux:callout variant="success" icon="check-circle" class="mb-6">
                {{ session('success') }}
            </flux:callout>
        @endif

        <form wire:submit="save" class="space-y-6">
            <flux:field>
                <flux:label>Nombre</flux:label>
                <flux:input wire:model="name" icon="user" type="text" />
                <flux:error name="name" />
            </flux:field>

            <flux:field>
                <flux:label>Email</flux:label>
                <flux:input wire:model="email" icon="envelope" type="email" />
                <flux:error name="email" />
            </flux:field>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <flux:field>
                    <flux:label>Nueva Contraseña (Opcional)</flux:label>
                    <flux:input wire:model="password" icon="key" type="password" />
                    <flux:error name="password" />
                </flux:field>

                <flux:field>
                    <flux:label>Confirmar Contraseña</flux:label>
                    <flux:input wire:model="password_confirmation" icon="key" type="password" />
                </flux:field>
            </div>

            <div class="flex justify-end">
                <flux:button type="submit" variant="primary" class="cursor-pointer bg-linear-to-r from-blue-500 via-blue-600 to-indigo-600 hover:from-blue-600 hover:via-blue-700 hover:to-indigo-700 text-white transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                    Guardar Cambios
                </flux:button>
            </div>
        </form>
    </div>
</div>
