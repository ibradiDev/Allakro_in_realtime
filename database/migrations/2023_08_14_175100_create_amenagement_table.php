<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amenagement', function (Blueprint $table) {
            $table->id();

            // Ma clé étrangère
            $table->unsignedBigInteger('famille_id')->nullable();
            $table->foreign('famille_id')->references('id')->on('famille');

            // Ma clé étrangère
            $table->unsignedBigInteger('indiv_sended_id')->nullable();
            $table->foreign('indiv_sended_id')->references('id')->on('individus');
            
            $table->string('nom_complet_amg')->nullable();
            $table->string('sexe_amg')->nullable();
            $table->string('fonction_amg')->nullable();
            $table->date('date_de_naissance')->nullable();
            $table->date('date_amenagement')->nullable();
            $table->string('provenance')->nullable();
            $table->string('mode_hebergement')->nullable();
            $table->string('lieu_habitation')->nullable();
            $table->integer('status')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('amenagement');
    }
};
