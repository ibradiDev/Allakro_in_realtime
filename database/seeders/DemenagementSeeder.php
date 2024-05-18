<?php

namespace Database\Seeders;

use App\Models\Demenagement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Nette\Utils\Random;

class DemenagementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Demenagement::create([
            'famille_id' => fake()->numberBetween(1, 8),
            'nom_complet_dmg' => fake()->name(),
            'sexe_dmg' => Random::generate(1, 'MF'),
            'fonction_dmg' => fake()->jobTitle(),
            'date_de_naissance' => fake()->dateTime(),
            'date_demenagement' => fake()->dateTime(),
            'destination' => fake()->address(),
            'status' => 1,
        ]);
    }
}