<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show list courses view
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $courses = Course::orderBy('created_at', 'DESC')->get();
        return view('platform.courses.index', compact('courses'));
    }

    /**
     * Show create course view
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        return view('platform.courses.create');
    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
        $data = array_filter($request->all());
        if (!empty($request->hasFile('cover'))) {
            $fileName =  time().'.'.$request->cover->extension();
            $request->file('cover')->storeAs('courses', $fileName, 'public');
            $data['cover'] = 'storage/courses/'.$fileName;
        }

        Course::create($data);
        return back()->with('message', 'Curso cadastrado');
    }
}
