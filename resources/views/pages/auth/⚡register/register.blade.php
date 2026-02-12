<div class="min-h-screen flex items-center justify-center bg-zinc-50 dark:bg-zinc-950 font-sans selection:bg-accent selection:text-accent-foreground">
    <div class="bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 p-8 rounded-xl shadow-xl w-full max-w-sm">
        <div class="flex flex-col items-center mb-6">
            <div class="w-10 h-10 bg-accent rounded-lg flex items-center justify-center text-accent-foreground font-bold text-2xl shadow-lg shadow-accent/30 mb-3">
                F
            </div>
            <h2 class="text-2xl font-bold text-center text-zinc-900 dark:text-white">Crear Cuenta</h2>
            <p class="text-zinc-500 text-sm">Únete a FlowTask hoy</p>
        </div>

        <form wire:submit="register" class="space-y-4">
            <flux:field>
                <flux:label>Nombre</flux:label>
                <flux:input wire:model="name" icon="user" type="text" placeholder="John Doe" />
                <flux:error name="name" />
            </flux:field>

            <flux:field>
                <flux:label>Email</flux:label>
                <flux:input wire:model="email" icon="envelope" type="email" placeholder="tu@email.com" />
                <flux:error name="email" />
            </flux:field>

            <flux:field>
                <flux:label>Contraseña</flux:label>
                <flux:input wire:model="password" icon="lock-closed" type="password" placeholder="••••••••" />
                <flux:error name="password" />
            </flux:field>

            <flux:field>
                <flux:label>Confirmar Contraseña</flux:label>
                <flux:input wire:model="password_confirmation" icon="lock-closed" type="password" placeholder="••••••••" />
            </flux:field>

            <flux:button type="submit" variant="primary" class="w-full shadow-lg shadow-accent/20" wire:loading.attr="disabled">
                <span wire:loading.remove>Registrarse</span>
                <span wire:loading>Procesando...</span>
            </flux:button>
        </form>

        <p class="mt-6 text-center text-sm text-zinc-500 dark:text-zinc-400">
            ¿Ya tienes cuenta?
            <a href="{{ route('login') }}" wire:navigate class="text-accent font-medium hover:underline hover:text-accent-content transition-colors">Inicia sesión</a>
        </p>
    </div>
</div>