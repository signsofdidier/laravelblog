<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('posts')->insert([
           'title' => 'Blog title',
           'description' => 'Lorem Ipsum is simply dummy text.',
           'user_id' => 1,
           'photo_id' => 1,
           'created_at' => now(),
        ]);
        Post::factory(100)->create();
    }
}
