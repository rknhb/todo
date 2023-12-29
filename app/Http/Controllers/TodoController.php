<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\TodoRequest;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function main(Request $request)
    {

        $keyword = $request->input('keyword');

        $query = Post::query();

        if(!empty($keyword)) {
            $query->where('title', 'LIKE', "%{$keyword}%")
                ->orWhere('text', 'LIKE', "%{$keyword}%");
        }

        $posts = $query->get();

        return view('main', compact('posts', 'keyword'));
    }

    public function add()
    {
        return view('add');
    }

    public function store(TodoRequest $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->text = $request->text;
        $post->save();

        return redirect()->route('main');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('edit', compact('post'));
    }

    public function update(TodoRequest $request, $id)
    {
        $post = Post::find($id);
        $post->fill([
            'title' => $request->title,
            'text' => $request->text,
        ])
        ->save();

        return redirect()->route('main');
    }

    public function delete($id)
    {
        $post = Post::destroy($id);
        return redirect()->route('main');
    }
}