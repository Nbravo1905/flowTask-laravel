<div class="min-h-screen flex items-center justify-center bg-zinc-50 dark:bg-zinc-950 font-sans selection:bg-accent selection:text-accent-foreground">
    <div class="bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 p-8 rounded-xl shadow-xl w-full max-w-sm">
        <div class="flex flex-col items-center mb-6">
            <div class="w-10 h-10 bg-accent rounded-lg flex items-center justify-center text-accent-foreground font-bold text-2xl shadow-lg shadow-accent/30 mb-3">
                F
            </div>
            <h2 class="text-2xl font-bold text-center text-zinc-900 dark:text-white">FlowTask</h2>
            <p class="text-zinc-500 text-sm">Bienvenido de nuevo</p>
        </div>

        <form wire:submit="login" class="space-y-4">
            <flux:field>
                <flux:label>Email</flux:label>
                <flux:input wire:model="email" icon="envelope" type="email" placeholder="tu@email.com" />
                <flux:error name="email" />
            </flux:field>

            <flux:field>
                <div class="flex justify-between items-center mb-1.5">
                    <flux:label>Contraseña</flux:label>
                    <a href="#" class="text-xs text-zinc-500 hover:text-accent transition-colors">¿Olvidaste tu contraseña?</a>
                </div>
                <flux:input wire:model="password" icon="lock-closed" type="password" placeholder="••••••••" />
                <flux:error name="password" />
            </flux:field>

            {{-- <div class="flex items-center">
                <input type="checkbox" wire:model="remember" id="remember" class="mr-2 rounded border-zinc-300 text-accent focus:ring-accent">
                <label for="remember" class="text-sm text-zinc-600 dark:text-zinc-400">Recordarme</label>
            </div> --}}

            <flux:button type="submit" variant="primary" class="w-full shadow-lg shadow-accent/20" wire:loading.attr="disabled">
                <span wire:loading.remove>Iniciar Sesión</span>
                <span wire:loading>Procesando...</span>
            </flux:button>
        </form>

        <p class="mt-6 text-center text-sm text-zinc-500 dark:text-zinc-400">
            ¿No tienes cuenta?
            <a href="{{ route('register') }}" wire:navigate class="text-accent font-medium hover:underline hover:text-accent-content transition-colors">Regístrate</a>
        </p>
    </div>
</div>