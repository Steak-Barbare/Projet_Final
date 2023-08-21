<?php

namespace Database\Factories;

use App\Models\Stockage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stockage>
 */
class StockageFactory extends Factory
{
    protected $model = Stockage::class;

    public function definition()
    {
        $enumOptions = DB::select(DB::raw('SHOW COLUMNS FROM stockages WHERE Field = "type"'))[0]->Type;
        preg_match('/^enum\((.*)\)$/', $enumOptions, $matches);
        $enumValues = explode(',', $matches[1]);
        
        return [
            'type' => $this->faker->randomElement($enumValues),
        ];
    }
}
