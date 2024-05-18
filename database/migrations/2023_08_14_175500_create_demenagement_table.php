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
        Schema::create('demenagement', function (Blueprint $table) {
            $table->id();

            // Ma clé étrangère
            $table->unsignedBigInteger('famille_id')->nullable();
            $table->foreign('famille_id')->references('id')->on('famille');

            // Ma clé étrangère
            $table->unsignedBigInteger('individu_sended_id')->nullable();
            $table->foreign('individu_sended_id')->references('id')->on('individus');

            $table->string('nom_complet_dmg')->nullable();
            $table->string('sexe_dmg')->nullable();
            $table->string('fonction_dmg')->nullable();
            $table->date('date_de_naissance')->nullable();
            $table->date('date_demenagement')->nullable();
            $table->string('destination')->nullable();
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
        Schema::dropIfExists('demenagement');
    }
};
