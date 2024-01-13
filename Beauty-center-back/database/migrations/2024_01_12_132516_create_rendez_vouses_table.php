<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRendezVousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rendez_vouses', function (Blueprint $table) {
            $table->id('id_Rendezvous');
            $table->foreignId('id_Client')->constrained('clients', 'id_Client');
            $table->foreignId('id_Employe')->constrained('employes', 'id_Employe');
            $table->foreignId('id_Service')->constrained('services', 'id_Service');
            $table->dateTime('date_rendezvous');
            $table->string('statut')->default('en_attente');
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
        Schema::dropIfExists('rendez_vouses');
    }
}
