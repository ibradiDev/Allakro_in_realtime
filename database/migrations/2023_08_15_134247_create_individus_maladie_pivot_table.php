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
        Schema::create('individus_maladie_pivot', function (Blueprint $table) {
            $table->id();

            // Ma clé étrangère
            $table->unsignedBigInteger('individus_id')->nullable();
            $table->foreign('individus_id')->references('id')->on('individus');

            // Clé etrangère
            $table->unsignedBigInteger('maladie_id')->nullable();
            $table->foreign('maladie_id')->references('id')->on('maladie');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('individus_maladie_pivot');
    }
};
