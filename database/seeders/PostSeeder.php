<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([

            [
                'user_id' => 1,
                'category_id' => 1,
                'title' => 'hoge',
                'content' => 'test'
            ],

            [
                'user_id' => 1,
                'category_id' => 1,
                'title' => 'hoge',
                'content' => 'test2'
            ],

            [
                'user_id' => 1,
                'category_id' => 1,
                'title' => 'hoge',
                'content' => 'test3'
            ],
        ]);
    }
}
