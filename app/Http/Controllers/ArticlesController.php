<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticlesController extends Controller
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
     * Show list articles view
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $articles = Article::all();
        return view('platform.articles.index', compact('articles'));
    }

    /**
     * Show create course view
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        return view('platform.articles.create');
    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
        $data = array_filter($request->all());
        $data['user_id'] = \Auth::user()->id;
        if (!empty($request->hasFile('image'))) {
            $fileName =  time().'.'.$request->image->extension();
            $request->file('image')->storeAs('articles', $fileName, 'public');
            $data['image'] = 'storage/articles/'.$fileName;
        }

        Article::create($data);
        return back()->with('message', 'Notícia cadastrada');
    }

    /**
     * @param Request $request
     */
    public function show(Request $request, $slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        $recentArticles = Article::whereNotIn('id', [$article->id])->orderBy('created_at', 'DESC')->limit(3)->get();
        return view('platform.articles.show', compact('article', 'recentArticles'));
    }
}
