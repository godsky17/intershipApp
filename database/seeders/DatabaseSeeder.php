<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Graduate;
use App\Models\Intership;
use App\Models\Rapport;
use App\Models\Role;
use App\Models\Theme;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin::factory(5)->create();
        // User::factory(10)->create();

        //User::factory()->create([
        //  'last_name' => 'Test',
        //  'first_name' => 'User',
        //  'email' => 'test@example.com',
        //]);
        // $users = User::factory(50)->create();
        //User::factory()->create([
        //  'last_name' => "Yelohin",
        //  'first_name' => "GAUTHE",
        //  'email' => 'chritiangauthe@gmail.com',
        //  'password' => Hash::make('Invincible1')
        //]);
        //Intership::factory(50)->create();
        //Rapport::factory(30)->create();
        //Theme::factory(60)->create();
    }
}
