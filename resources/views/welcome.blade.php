<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{ session('darkMode', true) ? 'dark' : 'light' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'FlowTask') }}</title>
    @livewireStyles
    @fluxAppearance
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-zinc-50 text-zinc-900 dark:bg-zinc-950 dark:text-zinc-100 font-sans selection:bg-accent selection:text-accent-foreground">

    <div class="min-h-screen flex flex-col justify-between">
        <!-- Header Flux -->
        <flux:header container class="border-b border-zinc-200 dark:border-zinc-800 bg-white/80 dark:bg-zinc-950/80 backdrop-blur-md sticky top-0 z-50">
            <div class="flex items-center gap-2 cursor-pointer">
                <div class="w-8 h-8 bg-accent rounded-lg flex items-center justify-center text-accent-foreground font-bold text-xl shadow-lg shadow-accent/30">
                    F
                </div>
                <span class="text-xl font-bold tracking-tight text-zinc-900 dark:text-white">FlowTask</span>
            </div>
            
            <flux:spacer />

            <flux:navbar>
                @if (Route::has('login'))
                    @auth
                        <flux:button href="{{ url('/dashboard') }}" variant="primary" icon="view-columns" wire:navigate>
                            Ir al Panel
                        </flux:button>
                    @else
                        <flux:navbar.item href="{{ route('login') }}" label="Iniciar Sesión" wire:navigate />
                        @if (Route::has('register'))
                            <flux:button href="{{ route('register') }}" variant="primary" icon="rocket-launch" class="ml-4" wire:navigate>
                                Comenzar Gratis
                            </flux:button>
                        @endif
                    @endauth
                @endif
            </flux:navbar>
        </flux:header>

        <!-- Hero Section -->
        <main class="flex-grow flex items-center justify-center px-6">
            <div class="max-w-4xl w-full text-center space-y-8">
                <div class="space-y-4">
                    <h1 class="text-5xl md:text-7xl font-bold tracking-tight text-zinc-900 dark:text-white leading-tight">
                        Simplifica tu <span class="bg-clip-text text-transparent bg-gradient-to-r from-accent to-accent-content">flujo de trabajo</span>.
                    </h1>
                    <p class="text-xl text-zinc-600 dark:text-zinc-400 max-w-2xl mx-auto leading-relaxed">
                        El gestor de tareas minimalista definitivo diseñado para mantenerte enfocado y eficiente. Planifica, sigue y completa tus objetivos con facilidad.
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mt-8">
                    @auth
                        <flux:button href="{{ url('/dashboard') }}" variant="primary" icon="view-columns" wire:navigate class="w-full sm:w-auto shadow-lg shadow-accent/20">
                            Ir al Panel
                        </flux:button>
                    @else
                        <flux:button href="{{ route('register') }}" variant="primary" icon="rocket-launch" wire:navigate class="w-full sm:w-auto shadow-lg shadow-accent/30 hover:shadow-accent/50 transform hover:-translate-y-1 transition-all duration-300">
                            Comenzar Gratis
                        </flux:button>
                        <flux:button href="{{ route('login') }}" variant="ghost" icon="arrow-right-end-on-rectangle" wire:navigate class="w-full sm:w-auto border border-zinc-200 dark:border-zinc-800 hover:bg-zinc-100 dark:hover:bg-zinc-900">
                            Iniciar Sesión
                        </flux:button>
                    @endauth
                </div>

                <!-- Feature Pills -->
                <div class="pt-12 flex flex-wrap justify-center gap-4 text-sm font-medium text-zinc-500 dark:text-zinc-400">
                    <div class="flex items-center gap-2 px-4 py-2 rounded-full bg-zinc-100 dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 transition-colors hover:border-accent">
                        <flux:icon.check-circle class="w-4 h-4 text-green-500" />
                        <span>Seguimiento de Tareas</span>
                    </div>
                    <div class="flex items-center gap-2 px-4 py-2 rounded-full bg-zinc-100 dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 transition-colors hover:border-accent">
                        <flux:icon.bolt class="w-4 h-4 text-blue-500" />
                        <span>Alta Eficiencia</span>
                    </div>
                    <div class="flex items-center gap-2 px-4 py-2 rounded-full bg-zinc-100 dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 transition-colors hover:border-accent">
                        <flux:icon.sparkles class="w-4 h-4 text-purple-500" />
                        <span>Simple y Limpio</span>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="py-8 text-center text-sm text-zinc-500 dark:text-zinc-600 border-t border-zinc-200 dark:border-zinc-900 mt-12">
            <p>&copy; {{ date('Y') }} FlowTask. Creado para la productividad.</p>
        </footer>
    </div>
    @livewireScripts
    @fluxScripts
</body>
</html>
