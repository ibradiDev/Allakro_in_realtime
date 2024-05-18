<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pharmacie', function (Blueprint $table) {
            $table->id();
            $table->string('nom_pharmacie')->nullable();
            $table->string('emplacement')->nullable();
            $table->string('email_pharmacie')->nullable();
            $table->string('telephone_pharmacie')->nullable();
            $table->boolean('de_garde')->nullable();
            $table->date('date_debut')->nullable();
            $table->date('date_fin')->nullable();
            $table->boolean('status')->nullable();

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
        Schema::dropIfExists('pharmacie');
    }
};