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
        $this->totalTask = Task::count();
        $this->taskCompleted = Task::where('status', 'completed')->count();
        $this->taskProgress = Task::where('status', 'progress')->count();
        if ($this->totalTask > 0) {
            $this->taskPorcentaje = round(($this->taskCompleted / $this->totalTask) * 100, 0);
        } else {
            $this->taskPorcentaje = 0;
        }
    }
};