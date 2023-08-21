<?php

namespace Database\Seeders;


use App\Models\Entreprise;
use App\Models\GestionParc;
use Illuminate\Database\Seeder;

class GestionParcSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $entreprises = Entreprise::all();

        foreach ($entreprises as $entreprise) {
            $gestionParc = GestionParc::factory()->create([
                'entreprise_id' => $entreprise->id,
                
            ]);
        }
    }
}
