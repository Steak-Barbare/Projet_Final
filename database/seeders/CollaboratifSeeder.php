<?php

namespace Database\Seeders;

use App\Models\Entreprise;
use App\Models\Collaboratif;
use Illuminate\Database\Seeder;

class CollaboratifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $entreprises = Entreprise::all();

        foreach ($entreprises as $entreprise) {
            $gestionParc = Collaboratif::factory()->create([
                'entreprise_id' => $entreprise->id,
               
            ]);
        }
    }
}
