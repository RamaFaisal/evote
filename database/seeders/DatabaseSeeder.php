<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolePermissionSeeder::class,
        ]);
        
        User::factory()->create([
            'name' => 'Super Admin',
            // 'full_name' => 'Super Admin',
            'email' => 'admin@evote.inkindo.org',
            'password' => Hash::make('password'),
        ]);

        //insert role to user
        $user = User::where('email', 'admin@evote.inkindo.org')->first();
        $user->assignRole('Super Admin');

        User::factory()->create([
            'name' => 'Panitia',
            // 'full_name' => 'Panitia',
            'email' => 'panitia@evote.inkindo.org',
            'password' => Hash::make('password'),
        ]);

        //insert role to user
        $user = User::where('email', 'panitia@evote.inkindo.org')->first();
        $user->assignRole('Panitia');

        //DPN Role
        User::factory()->create([
            'name' => 'DPN',
            // 'full_name' => 'DPN',
            'email' => 'dpn@evote.inkindo.org',
            'password' => Hash::make('password'),
        ]);

        //insert role to user
        $user = User::where('email', 'dpn@evote.inkindo.org')->first();
        $user->assignRole('DPN');

        //DPP Role
        User::factory()->create([
            'name' => 'DPP',
            // 'full_name' => 'DPP',
            'email' => 'dpp@evote.inkindo.org',
            'password' => Hash::make('password'),
        ]);

        //insert role to user
        $user = User::where('email', 'dpp@evote.inkindo.org')->first();
        $user->assignRole('DPP');

        //Voter Role
        User::factory()->create([
            'name' => 'Voter',
            // 'full_name' => 'Voter',
            'email' => 'voter@evote.inkindo.org',
            'password' => Hash::make('password'),
        ]);

        //insert role to user
        $user = User::where('email', 'voter@evote.inkindo.org')->first();
        $user->assignRole('Voter');

        //Bakal Calon Role  
        User::factory()->create([
            'name' => 'Bakal Calon',
            // 'full_name' => 'Bakal Calon',
            'email' => 'bakalcalon@evote.inkindo.org',
            'password' => Hash::make('password'),
        ]); 

        //insert role to user
        $user = User::where('email', 'bakalcalon@evote.inkindo.org')->first();
        $user->assignRole('Bakal Calon');
    }   
}
