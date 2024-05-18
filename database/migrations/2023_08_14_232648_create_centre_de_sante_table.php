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
        Schema::create('centre_de_sante', function (Blueprint $table) {
            $table->id();
            $table->string('nom_centre')->nullable();
            $table->string('telephone_centre')->nullable();
            $table->string('email_centre')->nullable();
            $table->string('emplacement_centre')->nullable();
            $table->string('offre_centre')->nullable();
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
        Schema::dropIfExists('centre_de_sante');
    }
};