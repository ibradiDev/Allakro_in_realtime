<?php

namespace Database\Seeders;

use App\Models\ProjetMairie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjetMairieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        ProjetMairie::create([
            'titre' => fake()->title(),
            'debut_projet' => fake()->dateTime('d/m/Y H:i'),
            'fin_projet' => fake()->date(),
            'description_projet' => fake()->text(),
            'status' => 1,
        ]);
    }
}