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
        Schema::create('naissance', function (Blueprint $table) {
            $table->id();

            // Ma clé étrangère
            $table->unsignedBigInteger('famille_id')->nullable();
            $table->foreign('famille_id')->references('id')->on('famille');

            // Ma clé étrangère
            $table->unsignedBigInteger('individus_sended_id')->nullable();
            $table->foreign('individus_sended_id')->references('id')->on('individus');

            $table->string('nom_complet')->nullable();
            $table->string('sexe_nouveau_ne')->nullable();
            $table->date('date_de_naissance')->nullable();
            $table->string('mode_naissance')->nullable();
            $table->string('pere_nouveau_ne')->nullable();
            $table->string('mere_nouveau_ne')->nullable();
            $table->string('lieu_habitation_famille')->nullable();
            $table->integer('status')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('naissance');
    }
};
