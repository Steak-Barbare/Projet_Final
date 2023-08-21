<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Entreprise;
use App\Models\GestionIdentite;

class GestionIdentiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $entreprises = Entreprise::all();

        foreach ($entreprises as $entreprise) {
            $gestionIdentite = GestionIdentite::factory()->create([
                'entreprise_id' => $entreprise->id,
            ]);
        }
    }
}

