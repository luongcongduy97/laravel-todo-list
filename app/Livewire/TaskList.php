<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;

class TaskList extends Component
{
    public $tasks;

    public function mount()
    {
        $this->tasks = Task::orderBy('created_at', 'asc')->get();
    }

    public function toggleCompletion($taskId)
    {
        $task = Task::findOrFail($taskId);
        $task->is_completed = !$task->is_completed;
        $task->save();

        session()->flash('success', 'Task status updated successfully!');

        $this->tasks = Task::orderBy('created_at', 'asc')->get();
    }

    public function render()
    {
        return view('livewire.task-list');
    }
}
