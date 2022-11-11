<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Challenge
        Category::factory()->createMany([[
            'name' => 'Challenge',
            'description' => '',
            'image' => ''
        ], [
            'name' => 'Culture',
            'description' => '',
            'image' => ''
        ], [
            'name' => 'Proj-inno',
            'description' => '',
            'image' => ''
        ], [
            'name' => 'Web-db',
            'description' => '',
            'image' => ''
        ], [
            'name' => 'Prog-devops',
            'description' => '',
            'image' => ''
        ], [
            'name' => 'Res-sys',
            'description' => '',
            'image' => ''
        ]]);
    }
}
