<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'last_name' => "Christian",
            'first_name' => "GAUTHE",
            'post' => "Develloppeur fullstark",
            'contrat_type' => "CDI",
            'email' => "gautheyelohin@gmail.com",
            'phone_number' => "+2290144214420",
            'status' => 0,
            'online' => 0,
            'password' => Hash::make('Administrateur1'),
            'role_id' => 1,
        ]);
    }
}
