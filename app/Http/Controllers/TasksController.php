<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStoreRequest;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
        return view('platform.tasks.create');
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
}
