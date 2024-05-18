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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string('sender');
            $table->string('sender_email')->nullable();
            $table->string('receiver');
            $table->string('receiver_email')->nullable();
            $table->text('message');
            $table->enum('type', ['entrant', 'sortant']);
            $table->enum('message_state', ['repondu', 'non repondu'])->default('non repondu');
            $table->integer('status')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};