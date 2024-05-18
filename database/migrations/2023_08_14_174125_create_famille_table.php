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
        Schema::create('famille', function (Blueprint $table) {
            $table->id();
            $table->string('nom_famille')->unique()->nullable();
            $table->string('email_famille')->nullable();
            $table->string('telephone_famille')->nullable();
            $table->string('lieu_habitation')->nullable();
            $table->integer('status')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('famille');
    }
};