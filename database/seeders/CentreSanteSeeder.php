<?php

namespace Database\Seeders;

use App\Models\CentreDeSante;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CentreSanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CentreDeSante::create([
            'nom_centre' => 'Clinique' . fake()->name(),
            'telephone_centre' => fake()->phoneNumber(),
            'email_centre' => fake()->email(),
            'emplacement_centre' => fake()->text(),
            'offre_centre' => fake()->text(),
            'status' => 1,
        ]);
    }
}