<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Status::create([
        //     'name' => "En attente"
        // ]);

        // Status::create([
        //     'name' => "Accepter"
        // ]);

        // Status::create([
        //     'name' => "Rejeter"
        // ]);

        Status::create([
            'name' => 'Lue'
        ]);

        Status::create([
            'name' => 'Lue et approuver'
        ]);
    }
}
