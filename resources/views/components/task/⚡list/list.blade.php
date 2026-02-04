<div>
    <div class="w-full max-w-8/12 mx-auto">
        <flux:text class="mt-2 mb-4 text-xl">Is Progress</flux:text>
        <flux:separator class="mb-4" />
        <div wire:sort="updateTaskOrder">
            @foreach ($tasks as $task)
            <div wire:sort:item="{{ $task->id }}" wire:key="task-{{ $task->id }}">
                <flux:card
                    class="bg-zinc-900 border border-zinc-800 rounded-xl mt-2 px-6 py-4 flex items-center justify-between">

                    <!-- Left -->
                    <div class="flex items-center gap-4 w-80">

                        <div wire:sort:handle class="cursor-grab active:cursor-grabbing">
                            <flux:icon.squares-2x2 class="w-5 h-5 text-zinc-500" />
                        </div>

                        <!-- Drag / status dot -->
                        <flux:button square type="buttom" loading="{{false}}" variant="ghost" size="xs"
                            class="cursor-pointer rounded-full border border-yellow-500 shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300"
                            wire:click="handleTaskCompleted({{ $task }})"></flux:button>

                        <div>
                            <h3 class="text-white font-medium text-sm">
                                {{$task->title}}
                            </h3>
                            <p class="text-zinc-400 text-xs flex items-center gap-1">
                                → {{ $task->priority }}
                            </p>
                        </div>
                    </div>

                    <!-- Center -->
                    <div class="flex items-center gap-2 text-zinc-400 text-sm w-2xs">
                        <flux:icon.calendar class="w-4 h-4" />
                        <span>{{$task->created_at->format('d M Y')}}</span>
                    </div>

                    <!-- Right -->
                    <div class="flex items-center gap-4">
                        <!-- Status -->
                        <span class="px-3 py-1 rounded-full text-xs font-medium bg-orange-500/10 text-orange-400">
                            In Progress
                        </span>

                        <!-- Actions -->
                        <div class="flex items-center gap-2">
                            <flux:button variant="ghost" size="sm" wire:click="copyTask({{$task}})">
                                <flux:icon.clipboard-document class="w-4 h-4 text-blue-400" />
                            </flux:button>

                            <flux:button variant="ghost" size="sm"
                                wire:click="$dispatch('open-edit-modal', { taskId: {{ $task->id }} })">
                                <flux:icon.pencil class="w-4 h-4 text-indigo-400" />
                            </flux:button>

                            <flux:button variant="ghost" size="sm" wire:click="delete({{$task}})"
                                wire:confirm="Are you sure you want to delete this task?">
                                <flux:icon.trash class="w-4 h-4 text-red-400" />
                            </flux:button>
                        </div>
                    </div>
                </flux:card>
            </div>
            @endforeach
        </div>
    </div>
    <div class="w-full max-w-8/12 mx-auto mt-32">
        <flux:text class="mt-2 mb-4 text-xl">Is Completed</flux:text>
        <flux:separator class="mb-4" />
        @foreach ($taskCompleted as $task)
        <flux:card
            class="bg-zinc-900 border border-zinc-800 rounded-xl mt-2 px-6 py-4 flex items-center justify-between">

            <!-- Left -->
            <div class="flex items-center gap-4 w-80">
                <!-- Drag / status dot -->
                <flux:button type="button" loading="{{false}}" square variant="ghost" size="xs"
                    class="cursor-pointer rounded-full border border-yellow-500 shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300"
                    wire:click="handleTaskCompleted({{ $task }})">
                    <flux:icon.check class="text-yellow-500" />
                </flux:button>

                <div>
                    <h3 class="text-white font-medium text-sm">
                        {{$task->title}}
                    </h3>
                    <p class="text-zinc-400 text-xs flex items-center gap-1">
                        → {{ $task->priority }}
                    </p>
                </div>
            </div>

            <!-- Center -->
            <div class="flex items-center gap-2 text-zinc-400 text-sm w-2xs">
                <flux:icon.calendar class="w-4 h-4" />
                <span>{{$task->created_at->format('d M Y')}}</span>
            </div>

            <!-- Right -->
            <div class="flex items-center gap-4">
                <!-- Status -->
                <span class="px-3 py-1 rounded-full text-xs font-medium bg-emerald-500/10 text-emerald-400">
                    Completed
                </span>

                <!-- Actions -->
                <div class="flex items-center gap-2">
                    <flux:button variant="ghost" size="sm" wire:click="copyTask({{$task}})">
                        <flux:icon.clipboard-document class="w-4 h-4 text-blue-400" />
                    </flux:button>

                    <flux:button variant="ghost" size="sm"
                        wire:click="$dispatch('open-edit-modal', { taskId: {{ $task->id }} })">
                        <flux:icon.pencil class="w-4 h-4 text-indigo-400" />
                    </flux:button>

                    <flux:button variant="ghost" size="sm" wire:click="delete({{$task}})">
                        <flux:icon.trash class="w-4 h-4 text-red-400" />
                    </flux:button>
                </div>
            </div>
        </flux:card>
        @endforeach
    </div>
</div>