<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\User;


class PostController extends Controller
{
    public function index()
    {
        
        $posts = Post :: all();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $input = $request->all();
        $user = Auth::user();
        $user->posts()->create($input);
        return redirect()->route('posts.index');
    }


    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }

    public function edit($id)
    {
        $posts = Post::findOrFail($id);
        return view('posts.edit', compact('posts'));
    }  
    
    public function update(Request $request, $id)
    {

        $posts = Post::findOrFail($id);
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);
        $input = $request->all();

        $posts->fill($input)->save();
        return redirect()->route('posts.index');

    }

    public function destroy($id)
    {
        Post::find($id)->delete();
        
        return redirect()->route('posts.index');
    }
}
