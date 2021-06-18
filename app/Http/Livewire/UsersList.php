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
            'users' => $this->getUsersByRole()
        ]);
    }

    public function delete($id)
    {
        User::findOrFail($id)->delete();
    }

    public function getUsersByRole()
    {
        if (Auth::user()->isSuperAdmin()) {
            return User::paginate($this->perPage);
        }
        return User::where('responsible_id', Auth::user()->id)->paginate($this->perPage);
    }
}
