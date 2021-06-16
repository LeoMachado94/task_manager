<?php

namespace App\Http\Livewire;

use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class UsersList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    protected $perPage = 12;

    public $assignedTo = null;

    public function mount()
    {
//        $this->tasks = Task::paginate(10);
    }

    public function render()
    {
        return view('livewire.users-list', [
            'users' => User::paginate($this->perPage)
        ]);
    }

    public function delete($id)
    {
        User::findOrFail($id)->delete();
    }
}
