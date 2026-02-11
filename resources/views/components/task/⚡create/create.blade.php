<flux:modal name="new-task" class="md:w-96">
    <form wire:submit="save">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Nueva Tarea</flux:heading>
                <flux:text class="mt-2">Describe aqui tu tarea</flux:text>
            </div>
            <flux:input label="Título" wire:model="title" placeholder="Escribe el título de tu tarea" class="shadow-lg!"/>
            <flux:select wire:model="status" label="Estado" placeholder="Selecciona un estado..." class="shadow-lg!">
                <flux:select.option value="progress">En Progreso</flux:select.option>
                <flux:select.option value="completed">Completada</flux:select.option>
            </flux:select>
            <flux:select wire:model="priority" label="Prioridad" placeholder="Selecciona la prioridad..." class="shadow-lg!">
                <flux:select.option value="low">Baja</flux:select.option>
                <flux:select.option value="medium">Media</flux:select.option>
                <flux:select.option value="high">Alta</flux:select.option>
            </flux:select>
            <flux:separator variant="subtle" />
            <div class="flex mt-3">
                <flux:spacer />
                <flux:modal.close>
                    <flux:button variant="ghost" class="mr-3 cursor-pointer shadow-lg!">Cancelar</flux:button>
                </flux:modal.close>
                <flux:button type="submit" variant="primary" class="cursor-pointer shadow-lg!">Guardar</flux:button>
            </div>
        </div>
    </form>
</flux:modal>