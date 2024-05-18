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
        Schema::create('maladie', function (Blueprint $table) {
            $table->id();
            $table->string('nom_maladie')->nullable();
            $table->string('description_maladie')->nullable();
            $table->string('mode_transmission_maladie')->nullable();
            $table->string('caracteristique_maladie')->nullable();
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
        Schema::dropIfExists('maladie');
    }
};