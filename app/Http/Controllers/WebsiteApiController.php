<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Website;

class WebsiteApiController extends Controller
{
    public function index()
    {
        return Website::all();
    }

    public function store()
    {
        request()->validate([
            'title' => 'required',
            'content' => 'required',
            'post_id' => 'required'
        ]);

        return Website::create([
            'title' => request('title'),
            'content' => request('content'),
            'post_id' => request('post_id'),
        ]);
    }

    public function update(Website $website)
    {
        request()->validate([
            'title' => 'required',
            'content' => 'required',
            'post_id' => 'required'
        ]);

        $success = $website->update([
            'title' => request('title'),
            'content' => request('content'),
            'post_id' => request('post_id'),
        ]);

        return [
            'success' => $success
        ];
    }
}
