<?php

use App\Models\Task;
use Livewire\Attributes\On;
use Livewire\Component;

new class extends Component
{
    public $totalTask;
    public $taskCompleted;
    public $taskProgress;
    public $taskPorcentaje;


    public function mount()
    {
        $this->chartTasks();
    }

    #[On('task-created')]
    #[On('task-updated')]
    #[On('task-deleted')]
    public function chartTasks()
    {
        $this->totalTask = Task::where('user_id', auth()->user()->id)->count(); 
        $this->taskCompleted = Task::where('status', 'completed')->where('user_id', auth()->user()->id)->count();
        $this->taskProgress = Task::where('status', 'progress')->where('user_id', auth()->user()->id)->count();
        if ($this->totalTask > 0) {
            $this->taskPorcentaje = round(($this->taskCompleted / $this->totalTask) * 100, 0);
        } else {
            $this->taskPorcentaje = 0;
        }
    }
};