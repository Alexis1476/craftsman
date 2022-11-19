<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::factory()->createMany([[
            // Compte apprenti
            'login' => 'apprINF',
            'password' => Hash::make('$ETML-PO2022'),
            'right' => 0
        ], [
            // Compte enseignant
            'login' => 'profINF',
            'password' => Hash::make('$ETML-PO2022'),
            'right' => 1
        ]]);
    }
}
