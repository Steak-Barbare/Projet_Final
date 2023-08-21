<?php

namespace Database\Factories;

use App\Models\Collaboratif;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Collaboratif>
 */
class CollaboratifFactory extends Factory
{
    protected $model = Collaboratif::class;

    public function definition()
    {
        $enumOptions = DB::select(DB::raw('SHOW COLUMNS FROM collaboratifs WHERE Field = "type"'))[0]->Type;
        preg_match('/^enum\((.*)\)$/', $enumOptions, $matches);
        $enumValues = explode(',', $matches[1]);
        
        return [
            'type' => $this->faker->randomElement($enumValues),
        ];
    }
}
