<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
    {
        public function index()
        {
            return view('admin.posts.index',[
                'posts' => Post::latest()->paginate(50)
            ]);
        }

        public function create(Post $post)
        {

            return view ('admin.posts.create', compact('post'));
        }

        /**
         * @throws \Exception
         */
        public function store(Post $post)
        {
            $attributes = array_merge($this->validatePost(), [
                'user_id' => auth()->id(),
                'slug' => Str::slug(request('title'),'-') . '-' . time(),
                'thumbnail' => request()->file('thumbnail')->store('thumbnails'),
            ]);

            Post::create($attributes);

            return redirect('/');
        }

        public function edit(Post $post)
        {
            return view ('admin.posts.edit', ['post' => $post]);
        }

        public function update(Post $post)
        {
            $attributes = $this->validatePost();

            if ($attributes['thumbnail'] ?? false) {
                $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
            }

            $post->update($attributes);

            return back()->with('success', 'Post Updated!');
        }

        public function destroy(Post $post)
        {
            $post->delete();
            return back()->with('success', 'Post Deleted!');
        }

        protected function validatePost(?Post $post = null): array
        {
            $post ??= new Post();

            return request()->validate([
                'title' => 'required',
                'thumbnail' => $post->exists ? ['image'] : ['required', 'image'],
                'excerpt' => 'required',
                'category_id' => ['required', Rule::exists('categories','id')],
                'body' => 'required',
                'published_at' => 'required'
            ]);
        }
    }
