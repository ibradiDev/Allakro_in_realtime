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
        Schema::create('epidemie', function (Blueprint $table) {
            $table->id();
            $table->string('nom_epidemie')->nullable();
            $table->date('debut_epidemie')->nullable();
            $table->date('fin_epidemie')->nullable();
            $table->string('nombre_de_cas_epidemie')->nullable();
            $table->string('nombre_de_deces_epidemie')->nullable();
            $table->text('mesure_preventive')->nullable();
            $table->string('zone_concernee')->nullable();
            $table->boolean('is_active')->nullable();
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
        Schema::dropIfExists('epidemie');
    }
};