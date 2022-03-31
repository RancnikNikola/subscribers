<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserApiController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function store(Request $request)
    {

        $user = $request->user();
        
        request()->validate([
            'name' => 'required',
            'email' => 'required',
            'website_id' => 'required'
        ]);

        return User::create([
            'name' => request('name'),
            'email' => request('email'),
            'website_id' => request('website_id')
        ]);
    }

    public function update(User $user)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required',
            'website_id' => 'required'
        ]);

        $success = $user->update([
            'name' => request('name'),
            'email' => request('email'),
            'website_id' => request('website_id')
        ]);

        return [
            'success' => $success
        ];
    }
}
