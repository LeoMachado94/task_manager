<?php

namespace App\Http\Livewire;

use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class DashboardTasks extends Component
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
        return view('livewire.dashboard-tasks', [
            'tasks' => $this->getTasksByRole()
        ]);
    }

    public function delete($id)
    {
        Task::findOrFail($id)->delete();
    }

    public function finished($id)
    {
        Task::findOrFail($id)->update(['status' => Task::$TASK_STATUS_FINISHED]);
    }

    public function setAssignedTo($owner)
    {
        $this->assignedTo = $owner;
    }

    public function getTasksByRole()
    {
        /**
         * @var User $user
         */
        $user = Auth::user();

        if ($user->isSuperAdmin()) {
            if ($this->assignedTo === 'me') {
                $tasks = Task::where('user_id', $user->id)
                    ->whereDate('date', date('Y-m-d'))
                    ->where('status', '!=', Task::$TASK_STATUS_FINISHED)->paginate($this->perPage);
            } else {
                $tasks = Task::whereDate('date', date('Y-m-d'))
                    ->where('status', '!=', Task::$TASK_STATUS_FINISHED)->paginate($this->perPage);
            }
        } else if ($user->isAdmin()) {
            if ($this->assignedTo === 'me') {
                $tasks = Task::where('user_id', $user->id)
                    ->whereDate('date', date('Y-m-d'))
                    ->where('status', '!=', Task::$TASK_STATUS_FINISHED)->paginate($this->perPage);
            } else {
                $tasks = Task::where('reporter_id', $user->id)
                    ->whereDate('date', date('Y-m-d'))
                    ->where('status', '!=', Task::$TASK_STATUS_FINISHED)->paginate($this->perPage);
            }
        } else {
            $tasks = Task::where('user_id', $user->id)
                ->whereDate('date', date('Y-m-d'))
                ->where('status', '!=', Task::$TASK_STATUS_FINISHED)->paginate($this->perPage);
        }
        return $tasks;
    }
}
