<div>
    <div class="w-full max-w-8/12 mx-auto">
        <flux:text class="mt-2 mb-4 text-xl font-bold text-zinc-900 dark:text-zinc-100">En Progreso</flux:text>
        <flux:separator class="mb-4 bg-accent" />
        <div wire:sort="updateTaskOrder">
            @foreach ($tasks as $task)
            <div wire:sort:item="{{ $task->id }}" wire:key="task-{{ $task->id }}">
                <flux:card
                    class="bg-white dark:bg-zinc-900 border! border-zinc-200! dark:border-zinc-800! rounded-xl mt-2 px-6 py-4 flex items-center justify-between shadow-adaptive! hover:shadow-accent-glow! transition-all duration-300">


                    <!-- Left -->
                    <div class="flex items-center gap-4 w-80">

                        <div wire:sort:handle class="cursor-grab active:cursor-grabbing">
                            <flux:icon.squares-2x2
                                class="w-5 h-5 text-zinc-400 dark:text-zinc-500 hover:text-accent transition" />
                        </div>

                        <!-- Drag / status dot -->
                        <flux:button square type="buttom" loading="{{false}}" variant="ghost" size="xs"
                            class="cursor-pointer rounded-full border-2! border-accent! shadow-lg hover:shadow-xl transform hover:scale-110 transition-all duration-300 hover:bg-accent/500!"
                            wire:click="handleTaskCompleted({{ $task }})"></flux:button>

                        <div>
                            <h3 class="text-zinc-900 dark:text-white font-medium text-sm">
                                {{$task->title}}
                            </h3>
                            <div class="flex items-center gap-2 mt-1">
                                @php
                                $priorityColors = [
                                'low' => 'bg-blue-500/10 text-blue-600 dark:text-blue-400 border-blue-500/20',
                                'medium' => 'bg-yellow-500/10 text-yellow-600 dark:text-yellow-400
                                border-yellow-500/20',
                                'high' => 'bg-red-500/10 text-red-600 dark:text-red-400 border-red-500/20'
                                ];
                                $colorClass = $priorityColors[$task->priority] ?? $priorityColors['low'];
                                @endphp
                                <span class="px-2 py-0.5 rounded text-xs font-medium border! {{ $colorClass }}">
                                    → {{ ucfirst($task->priority) }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Center -->
                    <div class="flex items-center gap-2 text-zinc-600 dark:text-zinc-400 text-sm w-2xs">
                        <flux:icon.calendar class="w-4 h-4 text-accent" />
                        <span>{{$task->created_at->format('d M Y')}}</span>
                    </div>

                    <!-- Right -->
                    <div class="flex items-center gap-4">
                        <!-- Status -->
                        <span
                            class="px-3 py-1 rounded-full shadow-lg text-xs font-medium bg-orange-500/10 text-orange-400 dark:text-orange-400 border! border-orange-500/20">
                            En Progreso
                        </span>

                        <!-- Actions -->
                        <div class="flex items-center gap-2">
                            <flux:button variant="ghost" size="sm" wire:click="copyTask({{$task}})"
                                class="hover:bg-blue-500/10! transition cursor-pointer shadow-lg">
                                <flux:icon.clipboard-document class="w-4 h-4 text-blue-500 dark:text-blue-400" />
                            </flux:button>

                            <flux:button variant="ghost" size="sm"
                                wire:click="$dispatch('open-edit-modal', { taskId: {{ $task->id }} })"
                                class="hover:bg-indigo-500/10! transition cursor-pointer shadow-lg">
                                <flux:icon.pencil class="w-4 h-4 text-indigo-500 dark:text-indigo-400" />
                            </flux:button>

                            <flux:button variant="ghost" size="sm" wire:click="delete({{$task}})"
                                wire:confirm="Are you sure you want to delete this task?"
                                class="hover:bg-red-500/10! transition cursor-pointer shadow-lg">
                                <flux:icon.trash class="w-4 h-4 text-red-500 dark:text-red-400" />
                            </flux:button>
                        </div>
                    </div>
                </flux:card>
            </div>
            @endforeach
        </div>
    </div>
    @if($this->showTaskCompleted())
    <div class="w-full max-w-8/12 mx-auto mt-25 pb-20">
        <flux:text class="mt-2 mb-4 text-xl font-bold text-zinc-900 dark:text-zinc-100">Completadas</flux:text>
        <flux:separator class="mb-4 bg-accent" />
        @foreach ($taskCompleted as $task)
        <flux:card
            class="bg-white dark:bg-zinc-900 border! border-zinc-200! dark:border-zinc-800! rounded-xl mt-2 px-6 py-4 flex items-center justify-between shadow-adaptive! hover:shadow-accent-glow! transition-all duration-300">

            <!-- Left -->
            <div class="flex items-center gap-4 w-80">

                <flux:button square type="buttom" loading="{{false}}" variant="ghost" size="xs"
                    class="cursor-pointer rounded-full border-2! border-accent! shadow-lg hover:shadow-xl transform hover:scale-110 transition-all duration-300 hover:bg-accent/500!"
                    wire:click="handleTaskCompleted({{ $task }})">
                    <flux:icon.check class="text-accent" />
                </flux:button>

                <div>
                    <h3 class="text-zinc-900 dark:text-white font-medium text-sm">
                        {{$task->title}}
                    </h3>
                    <div class="flex items-center gap-2 mt-1">
                        @php
                        $priorityColors = [
                        'low' => 'bg-blue-500/10 text-blue-600 dark:text-blue-400 border-blue-500/20',
                        'medium' => 'bg-yellow-500/10 text-yellow-600 dark:text-yellow-400
                        border-yellow-500/20',
                        'high' => 'bg-red-500/10 text-red-600 dark:text-red-400 border-red-500/20'
                        ];
                        $colorClass = $priorityColors[$task->priority] ?? $priorityColors['low'];
                        @endphp
                        <span class="px-2 py-0.5 rounded text-xs font-medium border! {{ $colorClass }}">
                            → {{ ucfirst($task->priority) }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Center -->
            <div class="flex items-center gap-2 text-zinc-600 dark:text-zinc-400 text-sm w-2xs">
                <flux:icon.calendar class="w-4 h-4 text-accent" />
                <span>{{$task->created_at->format('d M Y')}}</span>
            </div>

            <!-- Right -->
            <div class="flex items-center gap-4">
                <!-- Status -->
                <span class="px-3 py-1 rounded-full text-xs font-medium bg-emerald-500/10 text-emerald-400 dark:text-emerald-400 border! border-emerald-500/20">
                    Completeda
                </span>

                <!-- Actions -->
                <div class="flex items-center gap-2">
                    <flux:button variant="ghost" size="sm" wire:click="copyTask({{$task}})"
                        class="hover:bg-blue-500/10! transition cursor-pointer shadow-lg">
                        <flux:icon.clipboard-document class="w-4 h-4 text-blue-500 dark:text-blue-400" />
                    </flux:button>

                    <flux:button variant="ghost" size="sm"
                        wire:click="$dispatch('open-edit-modal', { taskId: {{ $task->id }} })"
                        class="hover:bg-indigo-500/10! transition cursor-pointer shadow-lg">
                        <flux:icon.pencil class="w-4 h-4 text-indigo-500 dark:text-indigo-400" />
                    </flux:button>

                    <flux:button variant="ghost" size="sm" wire:click="delete({{$task}})"
                        wire:confirm="Are you sure you want to delete this task?"
                        class="hover:bg-red-500/10! transition cursor-pointer shadow-lg">
                        <flux:icon.trash class="w-4 h-4 text-red-500 dark:text-red-400" />
                    </flux:button>
                </div>
            </div>
        </flux:card>
        @endforeach
    </div>
    @endif
</div>