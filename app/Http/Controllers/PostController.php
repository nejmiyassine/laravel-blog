<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $allPosts = [
            ['id' => 1, 'title' => 'JavaScript', 'posted_by' => 'Ahmed', 'created_at' => '2024-01-01 10:00:00'],
            ['id' => 2, 'title' => 'React', 'posted_by' => 'Mouhsine', 'created_at' => '2023-11-11 20:00:00'],
            ['id' => 3, 'title' => 'PHP', 'posted_by' => 'Youness', 'created_at' => '2023-11-08 14:00:00'],
            ['id' => 4, 'title' => 'Laravel', 'posted_by' => 'Yassine', 'created_at' => '2023-10-10 22:00:00'],
        ];
        return view('posts.index', ['posts' => $allPosts]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $data = request()->all();
        return $data;
        return redirect()->route('posts.index');
    }

    public function show($postId)
    {
        $singlePost = ['id' => 1, 'title' => 'JavaScript', 'description' => 'JavaScript is a very good language.', 'posted_by' => 'Ahmed', 'created_at' => '2024-01-01 10:00:00'];
        return view('posts.show', ['post' => $singlePost]);
    }

    public function edit($postId)
    {
        return view('posts.edit', ['postId' => $postId]);
    }

    public function update($postId)
    {
        $title = request()->title;
        $description = request()->description;
        $postCreator = request()->post_creator;

        // dd($title, $description, $postCreator);

        return redirect()->route('posts.show', 1);
    }

    public function delete($postId)
    {
        return redirect()->route('posts.index');
    }
}
