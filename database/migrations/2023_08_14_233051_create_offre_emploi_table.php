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
        Schema::create('offre_emploi', function (Blueprint $table) {
            $table->id();

            // Ma clé étrangère
            $table->unsignedBigInteger('individus_sended_id')->nullable();
            $table->foreign('individus_sended_id')->references('id')->on('individus');

            $table->string('nom_respo');
            $table->text('service_propose');
            $table->string('image')->nullable();
            $table->string('telephone_respo');
            $table->string('email_respo');
            $table->text('description_offre')->nullable();
            $table->string('competance_requise')->nullable();
            $table->enum('type_contrat', ['CDD', 'CDI']);
            $table->string('domaine_service');
            $table->integer('status');

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
        Schema::dropIfExists('offre_emploi');
    }
};