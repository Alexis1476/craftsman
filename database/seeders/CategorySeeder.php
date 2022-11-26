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
            'description' => 'Stimule la communication, le partage, la bienveillance, valeurs qu\'on veut transmettre dans la section.',
            'image' => 'challenge.png'
        ], [
            'name' => 'Culture',
            'description' => 'Stimule la communication, le partage, la bienveillance, valeurs qu\'on veut transmettre dans la section.',
            'image' => 'culture.png'
        ], [
            'name' => 'Proj-inno',
            'description' => '',
            'image' => 'proj-inno.png'
        ], [
            'name' => 'Web-db',
            'description' => '',
            'image' => 'web-db.png'
        ], [
            'name' => 'Prog-devops',
            'description' => '',
            'image' => 'prog-devops.png'
        ], [
            'name' => 'Res-sys',
            'description' => '',
            'image' => 'res-sys.png'
        ]]);
    }
}
