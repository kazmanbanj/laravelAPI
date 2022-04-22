<?php

use App\Post;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::firstOrCreate([
            'title' => Str::random(10),
            'body' =>  Str::random(40),
        ]);
    }
}
