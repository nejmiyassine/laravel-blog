<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', ['posts' => $posts]);
    }

    public function create()
    {
        $users = User::all();
        return view('posts.create', ['users' => $users]);
    }

    public function store()
    {
        $title = request()->title;
        $description = request()->description;

        Post::create([
            'title' => $title,
            'description' => $description,
        ]);

        return redirect()->route('posts.index');
    }

    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    public function edit(Post $post)
    {
        $users = User::all();

        return view('posts.edit', ['users' => $users, 'post' => $post]);
    }

    public function update($postId)
    {
        $title = request()->title;
        $description = request()->description;
        $postCreator = request()->post_creator;

        $singlePost = Post::find($postId);
        $singlePost->update([
            'title' => $title,
            'description' => $description
        ]);

        return redirect()->route('posts.show', $postId);
    }

    public function delete($postId)
    {
        return redirect()->route('posts.index');
    }
}
