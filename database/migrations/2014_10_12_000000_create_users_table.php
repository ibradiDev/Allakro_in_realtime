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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('role', ['admin', 'guest'])->default('guest');

            $table->date('naissance')->nullable();
            $table->enum('sexe', ['M', 'F']);
            $table->string('profession')->nullable();
            $table->string('telephone')->nullable();
            $table->enum('matrimoniale', ['en couple', 'celibataire'])->nullable();
            $table->integer('status')->default(1);

            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};