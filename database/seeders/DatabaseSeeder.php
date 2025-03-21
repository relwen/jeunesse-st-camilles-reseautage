<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;


use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Maestro Steven',
            'email' => 'admin1@stcamille.com',
            'password' => Hash::make('paroisse'),
        ]);

        User::factory()->create([
            'name' => 'Relwendé Jacob',
            'email' => 'relwen@stcamille.com',
            'password' => Hash::make('paroisse'),
        ]);

        User::factory()->create([
            'name' => 'Superviseur',
            'email' => 'super@stcamille.com',
            'password' => Hash::make('paroisse'),
        ]);


    }
}
