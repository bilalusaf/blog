<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Profile;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::factory()->count(10)->create();

        User::factory()
            ->has(Profile::factory()->state(function (array $attributes, User $user) {
                return ['user_id' => $user->id];
            }))
            ->has(Post::factory()->count(50)
                ->state(function (array $attributes, User $user, Category $category) {
                return ['user_id' => $user->id, 'category_id' => $category->id];
            })
            ->has(Comment::factory()->count(3))
                ->state(function (array $attributes, User $user, Post $post) {
                return ['user_id' => $user->id, 'category_id' => $post->id];
            }))
            ->create();


    }
}
