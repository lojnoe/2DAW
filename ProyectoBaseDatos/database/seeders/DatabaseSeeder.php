<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use \App\Models\Tag;
use \App\Models\Thread;
use \App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
    
        Tag::factory(6)->create();

        Category::factory(5)
            ->has(
                Thread::factory(10)->hasComments(8)
            )
            ->create();

        $tags= Tag::all();

        Thread::all()->each(function ($thread) use ($tags){
            $tag = $tags->random(rand(1, 6))->pluck('id')->toArray();

            $thread->tags()->attach($tag);
        });


    }
}
