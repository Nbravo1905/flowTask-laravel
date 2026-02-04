<div class="min-h-screen">
    <div class="flex gap-10 m-10 justify-center ">
        <flux:card class="w-69 shadow-xl hover:shadow-xl hover:scale-105 transform transition-all">
            <flux:heading size="lg">Total Tasks</flux:heading>
            <flux:text class="mt-2 mb-4 text-5xl">
                {{$totalTask ?? 0}}
            </flux:text>
        </flux:card>
        <flux:card class="w-69 shadow-xl hover:shadow-xl hover:scale-105 transform transition-all">
            <flux:heading size="lg">Completed</flux:heading>
            <flux:text class="mt-2 mb-4 text-5xl">
                {{$taskCompleted ?? 0}}
            </flux:text>
        </flux:card>
        <flux:card class="w-69 shadow-xl hover:shadow-xl hover:scale-105 transform transition-all">
            <flux:heading size="lg">In Progress</flux:heading>
            <flux:text class="mt-2 mb-4 text-5xl">
                {{$taskProgress ?? 0}}
            </flux:text>
        </flux:card>
        <flux:card class="w-69 shadow-xl hover:shadow-xl hover:scale-105 transform transition-all">
            <flux:heading size="lg">Completion Rate</flux:heading>
            <flux:text class="mt-2 mb-4 text-5xl">
                {{$taskPorcentaje ?? 0}}%
            </flux:text>
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