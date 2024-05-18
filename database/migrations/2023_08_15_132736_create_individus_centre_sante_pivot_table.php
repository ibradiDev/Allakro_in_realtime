<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('individus_centre_sante_pivot', function (Blueprint $table) {
            $table->id();

            // Ma clé étrangère
            $table->unsignedBigInteger('individus_id')->nullable();
            $table->foreign('individus_id')->references('id')->on('individus');

            // Clé etrangère
            $table->unsignedBigInteger('centre_sante_id')->nullable();
            $table->foreign('centre_sante_id')->references('id')->on('centre_de_sante');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('individus_centre_sante_pivot');
    }
};
