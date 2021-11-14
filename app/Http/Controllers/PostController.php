<?php

namespace App\Http\Controllers;


use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Nette\Utils\Random;

class PostController extends Controller
{
    public function index()
    {
//        dd(Gate::allows('admin'));
        return view('posts.index', [
            'posts' => Post::latest()->filter(
                request(['search', 'category', 'author'])
            )->paginate(6)->withQueryString(),
        ]);
    }

    public function show(Post $post)
    {
        return view ('posts.show', [
            'post' => $post
        ]);
    }

}
