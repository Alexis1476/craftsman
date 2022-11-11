<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->createMany([[
            // Compte apprenti
            'login' => 'apprINF',
            'password' => Hash::make('$ETML-PO2022'),
            'admin' => 0
        ], [
            // Compte enseignant
            'login' => 'profINF',
            'password' => Hash::make('$ETML-PO2022'),
            'admin' => 1
        ]]);
    }
}
