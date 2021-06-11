<?php

namespace App\Http\Livewire;

use App\Models\Task;
use Livewire\Component;
use Livewire\WithPagination;

class TasksList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $perPage = 12;

//    public $tasks;

    public function mount()
    {
//        $this->tasks = Task::paginate(10);
    }

    public function render()
    {
        return view('livewire.tasks-list', [
            'tasks' => Task::paginate($this->perPage)
        ]);
    }
}
