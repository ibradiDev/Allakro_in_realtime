<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('epidemie_maladie_pivot', function (Blueprint $table) {
            $table->id();

            // Ma clé étrangère
            $table->unsignedBigInteger('maladie_id')->nullable();
            $table->foreign('maladie_id')->references('id')->on('maladie');

            // Clé etrangère
            $table->unsignedBigInteger('epidemie_id')->nullable();
            $table->foreign('epidemie_id')->references('id')->on('epidemie');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('epidemie_maladie_pivot');
    }
};