<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class TasksController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('platform.tasks.index');
    }

    public function create()
    {
        if (Auth::user()->isSuperAdmin()) {
            $users = User::all();
        } else {
            $users = User::where('level_access', '!=', 99)->get();
        }

        return view('platform.tasks.create', compact('users'));
    }

    public function store(TaskStoreRequest $request)
    {
        $data = $request->all();
        $data['date'] = Carbon::createFromFormat('Y-m-d H:i:s', $data['date'].' '.$data['hour'].':00');
        Task::create($data);
        return back();
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('platform.tasks.edit', compact('task'));
    }

    public function show($id)
    {
        $task = Task::findOrFail($id);
        return view('platform.tasks.show', compact('task'));
    }

    public function update(TaskUpdateRequest $request, $id)
    {
        $task = Task::findOrFail($id);
        $data = $request->all();
        $data['date'] = Carbon::createFromFormat('Y-m-d H:i:s', $data['date'].' '.$data['hour'].':00');
        $task->update($data);
        return redirect()->route('tasks.index');
    }

    public function destroy($id)
    {
        try {
            Task::findOrFail($id)->delete();
            return response()->json([
                'success' => true,
                'message' => __('global.messages.removed')
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage()
            ]);
        }
    }

    public function getTasks()
    {
        $data = Task::all();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row) {
                return implode('', [
                    $this->mountEditBtn($row->id), $this->mountDeleteBtn($row->id)
                ]);
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function mountEditBtn($id)
    {
        return '<a href="'.route('tasks.edit', $id).'" class="btn-edit"><i data-feather="edit"></i></a>';
    }

    public function mountDeleteBtn($id)
    {
        return '<a href="#" class="btn-delete text-danger" data-id="'.$id.'"><i data-feather="trash"></i></a>';
    }
}
