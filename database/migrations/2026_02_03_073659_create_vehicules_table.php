<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('vehicules', function (Blueprint $table) {
        $table->id(); // PK [cite: 35]
        $table->string('immatriculation')->unique(); // [cite: 36]
        $table->string('marque'); // [cite: 37]
        $table->string('modele'); // [cite: 38]
        $table->string('couleur')->nullable(); // [cite: 39]
        $table->smallInteger('annee')->nullable(); // [cite: 40]
        $table->integer('kilometrage')->nullable(); // [cite: 41]
        $table->string('carrosserie')->nullable(); // [cite: 42]
        $table->string('energie')->nullable(); // [cite: 43]
        $table->string('boite')->nullable(); // [cite: 44]
        $table->string('photo')->nullable(); // Ajout pour votre demande d'images
        $table->timestamps(); // created_at / updated_at [cite: 45]
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicules');
    }
}
