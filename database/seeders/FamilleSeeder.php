<?php

namespace Database\Seeders;

use App\Models\Famille;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Testing\Fakes\Fake;

class FamilleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Famille::truncate();

        Famille::create([
            'nom_famille' => fake()->lastName(),
            'email_famille' => fake()->email(),
            'telephone_famille' => fake()->phoneNumber(),
            'lieu_habitation' => fake()->streetAddress(),
            'status' => 1
        ]);
    }
}