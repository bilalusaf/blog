<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

    class RegisterController extends Controller
    {
        public function create()
        {
            return view('register.create');
        }

        public function store()
        {
            $attributes = request()->validate([
                'name' => 'required|max:255',
                'username' => 'unique:users,username|required|min:5|max:15',
                'email' => 'unique:users,email|required|email|max:255',
                'password' => 'required|min:8|max:25',
            ]);

            $user = User::create($attributes);

            auth()->login($user);

            return redirect('/')->with('success', 'Your account has been created.');
        }
    }
