<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
    {
        public function show(Profile $profile)
        {
            $user = $profile->user;

            return view ('profiles.show', compact('user', 'profile'));
        }

        public function create(Profile $profile)
        {
            $profile = new Profile();

            $profile->user_id = auth()->user()->id;
            $profile->name = request()->user()->name;
            $profile->email = request()->user()->email;
            $profile->description = 'I will soon update my profile to add a little something about myself.';

            $profile->save();

            $user = $profile->user;

            return redirect('/')->with('success', 'Your account has been created.');
        }

        public function edit(Profile $profile)
        {
            $user = $profile->user;

            $this->authorize('update', $user->profile);

            return view ('profiles.edit', compact('user', 'profile'));
        }

        public function update(Profile $profile)
        {
            $user = $profile->user;

            $this->authorize('update', $user->profile);

            $attributes = request()->validate([
                'name' => 'required|max:255',
                'email' => 'email|required|email|max:255',
                'image' => 'image',
                'description' => 'required',
            ]);

            if ($attributes['image']) {
                $imagePath = request()->file('image')->store('avatars');
                $image = Image::make(public_path("storage/{$imagePath}"))->orientate()->fit(96,96);
                $image->save();
            }

            $attributes['user_id'] = $user->id;

            $profile->update(array_merge($attributes, ['image' => $imagePath]));

            return redirect ("profiles/{$user->profile->id}")->with('success', 'Profile Updated!');
        }
    }
