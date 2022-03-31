<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class PostApiController extends Controller
{
    public function index()
    {
        return Post::all();
    }

    public function store()
    {
        request()->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        return Post::create([
            'title' => request('title'),
            'description' => request('description')
        ]);
    }

    public function update(Post $post)
    {
        request()->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $success = $post->update([
            'title' => request('title'),
            'description' => request('description')
        ]);

        return [
            'success' => $success
        ];
    }
}
