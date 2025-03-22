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
            'email' => '######',
            'password' => Hash::make('gffedf'),
        ]);

        User::factory()->create([
            'name' => 'Relwendé Jacob',
            'email' => '######',
            'password' => Hash::make('ddddd'),
        ]);

        User::factory()->create([
            'name' => 'Superviseur',
            'email' => '####',
            'password' => Hash::make('dddd'),
        ]);


    }
}
