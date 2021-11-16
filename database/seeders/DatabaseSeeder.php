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
        $category = Category::factory()->count(10)->create();

        Profile::factory()
            ->for(User::factory())
            ->create();

        Post::factory()->count(25)
            ->for(User::factory())
            ->create();

        Comment::factory()->count(2)
            ->for(Post::factory())
            ->create();
    }
}
