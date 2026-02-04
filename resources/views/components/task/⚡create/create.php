<?php

use App\Models\Task;
use Livewire\Attributes\Validate;
use Livewire\Component;

new class extends Component
{
    #[Validate('required')] 
    public $title = '';

    #[Validate('required')]
    public $status = 'progress';

    #[Validate('required')]
    public $priority = '';


    public function save()
    {
        $this->validate();

        $maxPosition = Task::where('status', 'progress')->max('position') ?? 0;

        Task::create([
            'title' => $this->title,
            'status' => $this->status,
            'priority' => $this->priority,
            'user_id' => auth()->user()->id,
            'position' => $maxPosition + 1,
        ]);

        session()->flash('success', 'Task successfully created.');

        return redirect()->to('/dashboard');
    }
};