<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Student account
        User::factory()->create([
            'login' => 'apprINF',
            'password' => Hash::make('$ETML-PO2022'),
            'admin' => 0
        ]);

        // Teacher account
        User::factory()->create([
            'login' => 'profINF',
            'password' => Hash::make('$ETML-PO2022'),
            'admin' => 1
        ]);
    }
}
