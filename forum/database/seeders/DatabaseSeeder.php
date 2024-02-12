<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         $users= \App\Models\User::factory(10)->create();

         $posts = Post::factory(200)
                      ->has(Comment::factory(15)->recycle($users))
                      ->recycle($users)
                      ->create();

         $comments = Comment::factory(100)->recycle($users)->recycle($posts)->create();

         $ninoh= \App\Models\User::factory()
                                ->has(Post::factory(45))
                                ->has(Comment::factory(120)->recycle($posts))
                                ->create([
             'name' => 'Ninoh van Dijke',
             'email' => 'ninohvdijke@gmail.com',
         ]);
    }
}
