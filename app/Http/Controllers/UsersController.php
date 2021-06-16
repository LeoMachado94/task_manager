<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;

class UsersController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('platform.users.index');
    }

    public function create()
    {
        return view('platform.users.create');
    }

    public function store(UserStoreRequest $request)
    {
        $data = $request->all();
        User::create($data);
        return redirect()->route('users.index')->with('message', 'User created with success!');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('platform.users.edit', compact('user'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('platform.users.show', compact('user'));
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $task = User::findOrFail($id);
        $data = $request->all();
        $task->update($data);
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        try {
            User::findOrFail($id)->delete();
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
}
