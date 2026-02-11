<div class="min-h-screen bg-white dark:bg-zinc-900 transition-colors">
    <div class="flex gap-15 pt-10 mb-10 justify-center flex-wrap ">
        <flux:card class="w-69 shadow-adaptive-xl! hover:shadow-accent-glow! hover:scale-105 transform transition-all duration-300 border! border-zinc-200! dark:border-zinc-700!">
            <div class="flex items-start justify-between">
                <div>
                    <flux:heading size="lg" class="text-zinc-700 dark:text-zinc-300">
                        Total Tareas
                    </flux:heading>
                    <flux:text class="mt-2 text-5xl font-bold text-accent">
                        {{ $totalTask ?? 0 }}
                    </flux:text>
                </div>
                <div class="w-10 h-10 rounded-full bg-accent/10 flex items-center justify-center">
                    <flux:icon.list-bullet class="w-6 h-6 text-accent" />
                </div>
            </div>
        </flux:card>
        <flux:card class="w-69 shadow-adaptive-xl! hover:shadow-accent-glow! hover:scale-105 transform transition-all duration-300 border! border-zinc-200! dark:border-zinc-700!">
            <div class="flex items-start justify-between">
                <div>
                    <flux:heading size="lg" class="text-zinc-700 dark:text-zinc-300">
                        Completadas
                    </flux:heading>
                    <flux:text class="mt-2 text-5xl font-bold text-accent">
                        {{ $taskCompleted ?? 0 }}
                    </flux:text>
                </div>
                <div class="w-10 h-10 rounded-full bg-accent/10 flex items-center justify-center">
                    <flux:icon.check-circle class="w-6 h-6 text-accent" />
                </div>
            </div>
        </flux:card>
        <flux:card class="w-69 shadow-adaptive-xl! hover:shadow-accent-glow! hover:scale-105 transform transition-all duration-300">
            <div class="flex items-start justify-between">
                <div>
                    <flux:heading size="lg" class="text-zinc-700 dark:text-zinc-300">
                        En Progreso
                    </flux:heading>
                    <flux:text class="mt-2 text-5xl font-bold text-accent">
                        {{ $taskProgress ?? 0 }}
                    </flux:text>
                </div>
                <div class="w-10 h-10 rounded-full bg-accent/10 flex items-center justify-center">
                    <flux:icon.clock class="w-6 h-6 text-accent" />
                </div>
            </div>
        </flux:card>
        <flux:card class="w-69 shadow-adaptive-xl! hover:shadow-accent-glow! hover:scale-105 transform transition-all duration-300">
            <div class="flex items-start justify-between">
                <div>
                    <flux:heading size="lg" class="text-zinc-700 dark:text-zinc-300">
                        Tasa de finalización
                    </flux:heading>
                    <flux:text class="mt-2 text-5xl font-bold text-accent">
                        {{ $taskPorcentaje ?? 0 }}%
                    </flux:text>
                </div>
                <div class="w-10 h-10 rounded-full bg-accent/10 flex items-center justify-center">
                    <flux:icon.chart-bar class="w-6 h-6 text-accent" />
                </div>
            </div>
        </flux:card>
    </div>
    @if (session('success'))
        <flux:callout variant="success" icon="check-circle" x-data="{ visible: true }" x-show="visible"
            class="w-4xl mx-auto mt-10">
            <flux:callout.heading class="flex gap-2 @max-md:flex-col items-start">Success <flux:text>{{ session('success')
                    }}</flux:text>
            </flux:callout.heading>
            <x-slot name="controls">
                <flux:button icon="x-mark" variant="ghost" x-on:click="visible = false" />
            </x-slot>
        </flux:callout>
    @endif
    <livewire:task.create />
    <livewire:task.list />
    <livewire:task.edit />
</div>