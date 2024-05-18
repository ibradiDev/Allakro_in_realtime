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
        Schema::create('individus', function (Blueprint $table) {
            $table->id();

            // Ma clé étrangère
            $table->unsignedBigInteger('famille_id')->nullable();
            $table->foreign('famille_id')->references('id')->on('famille');

            $table->string('nom_individu');
            $table->string('prenom_individu');
            $table->string('date_naissance');
            $table->enum('sexe_individu', ['M', 'F']);
            $table->string('profession_individu')->nullable();
            $table->string('telephone')->nullable();
            $table->string('situation_matrimoniale')->nullable();
            $table->integer('status_indiv')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('individus');
    }
};