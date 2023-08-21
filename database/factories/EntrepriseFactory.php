<?php

namespace Database\Factories;

use App\Models\Entreprise;
use App\Models\GestionIdentite;
use App\Models\GestionParc;
use APP\Models\Collaboratif;
use APP\Models\Stockage;
use Illuminate\Database\Eloquent\Factories\Factory;

class EntrepriseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Entreprise::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'logo' => $this->faker->imageUrl(),
        ];
    }
    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (Entreprise $entreprise) {
            $entreprise->gestionIdentite()->create([
                'type' => $this->faker->randomElement(['M365', 'Google Workspace', 'Microsoft Exchange', 'Autres']),
            ]);
            $entreprise->gestionParc()->create([
                'type' => $this->faker->randomElement(['MEM', 'AirWatch', 'Azure AD', 'Sans', 'Autres']),
            ]);
            $entreprise->collaboratif()->create([
                'type' => $this->faker->randomElement(['Teams', 'Google Meet', 'Slack', 'Autres'])
            ]);
            $entreprise->stockage()->create([
                'type' => $this->faker->randomElement(['HDD', 'One Drive', 'Dropbox', 'Non Maîtrisé', 'Autres'])
            ]);
        });
    }
}
