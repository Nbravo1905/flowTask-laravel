<flux:modal name="new-task" class="md:w-96">
    <form wire:submit="save">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Nueva Tarea</flux:heading>
                <flux:text class="mt-2">Describe aqui tu tarea</flux:text>
            </div>
            <flux:input label="Title" wire:model="title" placeholder="Your title" aria-autocomplete="none" />
            <flux:select wire:model="status" label="Status" placeholder="Choose Status..." class="w-full">
                <flux:select.option value="progress">In Progress</flux:select.option>
                <flux:select.option value="completed">Completed</flux:select.option>
            </flux:select>
            <flux:select wire:model="priority" label="Priority" placeholder="Choose Priority..." class="w-full">
                <flux:select.option value="low">Low</flux:select.option>
                <flux:select.option value="medium">Medium</flux:select.option>
                <flux:select.option value="high">High</flux:select.option>
            </flux:select>
            <flux:separator variant="subtle" />
            <div class="flex mt-3">
                <flux:spacer />
                <flux:button type="cancel" variant="ghost" class="mr-3 cursor-pointer"
                    x-on:click="$flux.modal('new-task').close()">Cancelar</flux:button>
                <flux:button type="submit" variant="primary" class="cursor-pointer">Guardar</flux:button>
            </div>
        </div>
    </form>
</flux:modal>