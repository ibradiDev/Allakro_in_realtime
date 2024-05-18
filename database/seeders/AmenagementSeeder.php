<?php

namespace Database\Seeders;

use App\Models\Amenagement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Nette\Utils\Random;

class AmenagementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Amenagement::create([
            'famille_id' => fake()->numberBetween(1, 7),
            'nom_complet_amg' => fake()->name(),
            'sexe_amg' => Random::generate(1, 'MF'),
            'fonction_amg' => fake()->jobTitle(),
            'date_de_naissance' => fake()->dateTime(),
            'date_amenagement' => fake()->dateTime(),
            'provenance' => fake()->address(),
            'mode_hebergement' => 'Chez un parent',
            'lieu_habitation' => fake()->address(),
            'status' => 1,
        ]);
    }
}