<?php

use App\Blog;
use Illuminate\Database\Seeder;

class blogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Blog::create([
            'title' => 'First Blog',
            'description' => 'First Blog Desc.',
            'image' => 'image1.jpeg',
            'author' => 'Author New',
        ]);
        Blog::create([
            'title' => 'Second Blog',
            'description' => 'Second Blog Desc.',
            'image' => 'image2.jpg',
            'author' => 'Author Second',
        ]);

    }
}
