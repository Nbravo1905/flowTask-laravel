<flux:modal wire:model="showModal" name="edit-task" class="md:w-96">
    <form wire:submit="update">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Editar Tarea</flux:heading>
                <flux:text class="mt-2">Edita aqui tu tarea</flux:text>
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
                <flux:button variant="ghost" class="mr-3 cursor-pointer" wire:click="closeModal">Cancelar</flux:button>
                <flux:button type="submit" variant="primary" class="cursor-pointer">Actualizar</flux:button>
            </div>
        </div>
    </form>
</flux:modal>