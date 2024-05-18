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
        Schema::create('individus_projets_mairie_pivot', function (Blueprint $table) {
            $table->id();

            // Clé etrangère
            $table->unsignedBigInteger('individus_id')->nullable();
            $table->foreign('individus_id')->references('id')->on('individus');

            // Clé etrangère
            $table->unsignedBigInteger('projets_mairie_id')->nullable();
            $table->foreign('projets_mairie_id')->references('id')->on('offre_emploi');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('individus_projets_mairie_pivot');
    }
};