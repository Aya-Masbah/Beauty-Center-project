<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employes', function (Blueprint $table) {
            $table->id('id_Employe');
            $table->foreignId('id_Compte')->constrained('comptes', 'id_Compte');
            $table->string('nom');
            $table->string('prenom');
            $table->string('numero_telephone')->nullable();
            $table->string('email')->unique();
            $table->text('competences')->nullable();
            $table->text('horaires_travail')->nullable();
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
        Schema::dropIfExists('employes');
    }
}
