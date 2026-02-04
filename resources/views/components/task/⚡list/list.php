<?php

use App\Models\Task;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

new class extends Component
{
    public $tasks;
    public $taskCompleted;
    
    public function mount()
    {
        $this->getTasks();
    }

    #[On('task-created')]
    #[On('task-updated')]
    #[On('task-deleted')]
    #[Computed]
    public function getTasks()
    {
        $this->tasks = Task::where('status', 'progress')
            ->orderBy('position')
            ->get();
        
        $this->taskCompleted = Task::where('status', 'completed')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function copyTask(Task $task)
    {
        $titleCopy = $task->title.' copy';

        $maxPosition = Task::where('status', 'progress')->count() ?? 0;

        Task::create([
            'title' => $titleCopy,
            'status' => $task->status,
            'priority' => $task->priority,
            'user_id' => auth()->user()->id,
            'position' => $maxPosition
        ]);
        
        $this->dispatch('task-updated');
    }

    public function delete(Task $task)
    {
        $task->delete();
        $this->dispatch('task-deleted');
        session()->flash('success', 'Task deleted!');
    }

    public function handleTaskCompleted(Task $task)
    {
        $task->update([
            'status' => $task->status === 'progress' ? 'completed' : 'progress',
        ]);
        $this->dispatch('task-updated');
        session()->flash('success', 'Task completed!');
    }

    public function updateTaskOrder($item, $position)
    {
        $task = Task::findOrFail($item);
        
        // Obtener todas las tareas en progreso ordenadas
        $tasks = Task::where('status', 'progress')
            ->orderBy('position')
            ->get();
        
        // Remover la tarea actual de la colección
        $tasks = $tasks->reject(fn($t) => $t->id === $task->id);
        
        // Insertar la tarea en la nueva posición
        $tasks->splice($position, 0, [$task]);
        
        // Actualizar las posiciones de todas las tareas
        $tasks->values()->each(function ($task, $index) {
            Task::where('id', $task->id)->update(['position' => $index]);
        });

        $this->getTasks();
    }
};