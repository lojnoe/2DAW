<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            'title' => 'El gran Gatsby',
            'published_year' => 1925,
        ]);
        DB::table('books')->insert([
            'title' => 'Cien años de soledad',
            'published_year' => 1967,
        ]);
    }
}
