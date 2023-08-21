<?php

namespace Database\Factories;

use App\Models\GestionParc;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GestionParc>
 */
class GestionParcFactory extends Factory
{
    protected $model = GestionParc::class;

    public function definition()
    {
        $enumOptions = DB::select(DB::raw('SHOW COLUMNS FROM gestion_parcs WHERE Field = "type"'))[0]->Type;
        preg_match('/^enum\((.*)\)$/', $enumOptions, $matches);
        $enumValues = explode(',', $matches[1]);
        
        return [
            'type' => $this->faker->randomElement($enumValues),
        ];
    }
}
