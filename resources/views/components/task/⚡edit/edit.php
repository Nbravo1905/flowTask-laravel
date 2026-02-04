<?php

use App\Models\Task;
use Flux\Flux;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

new class extends Component {

    public bool $showModal = false;
    public ?Task $task = null;

    #[Validate('required')] 
    public $title = '';

    #[Validate('required')]
    public $status = 'progress';

    #[Validate('required')]
    public $priority = '';

    #[On('open-edit-modal')]
    public function openModal($taskId)
    {
        $this->task = Task::findOrFail($taskId);
        $this->title = $this->task->title;
        $this->status = $this->task->status;
        $this->priority = $this->task->priority;
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->reset(['task', 'title', 'status', 'priority']);
        $this->resetValidation();
    }

    public function update()
    {
        $this->validate();

        $this->task->update([
            'title' => $this->title,
            'status' => $this->status,
            'priority' => $this->priority,
        ]);
        $this->closeModal();
        Flux::toast('Task successfully updated.', variant: 'success');
        $this->dispatch('task-updated');

    }
};