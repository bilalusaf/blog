<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;


class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::all()->sortBy([
            ['admin', 'desc'],
            ['name', 'asc'],
        ]);

        return view('admin.users.index',compact('users'));
    }

    public function update(User $user)
    {
        $attributes = request()->validate([
            'admin' => 'required'
        ]);

        $attributes['admin'] = ($attributes['admin']) ? 0 : 1;

        $attributes['id'] =$user->id;


        $user->update($attributes);

        return back();
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('success', 'User Deleted!');
    }
}
