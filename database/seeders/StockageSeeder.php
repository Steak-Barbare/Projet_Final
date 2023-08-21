<?php

namespace Database\Seeders;

use App\Models\Entreprise;
use App\Models\Stockage;
use Illuminate\Database\Seeder;

class StockageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $entreprises = Entreprise::all();

        foreach ($entreprises as $entreprise) {
            $gestionParc = Stockage::factory()->create([
                'entreprise_id' => $entreprise->id,
                
            ]);
        }
    }
}
