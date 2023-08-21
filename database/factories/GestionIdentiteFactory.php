<?php

use App\Models\GestionIdentite;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class GestionIdentiteFactory extends Factory
{
    protected $model = GestionIdentite::class;

    public function definition()
    {
        $enumOptions = DB::select(DB::raw('SHOW COLUMNS FROM gestion_identites WHERE Field = "type"'))[0]->Type;
        preg_match('/^enum\((.*)\)$/', $enumOptions, $matches);
        $enumValues = explode(',', $matches[1]);
        
        return [
            'type' => $this->faker->randomElement($enumValues),
        ];
    }
}

