<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTechniciensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('techniciens', function (Blueprint $table) {
        $table->id(); // PK [cite: 47]
        $table->string('nom'); // [cite: 48]
        $table->string('prenom'); // [cite: 49]
        $table->string('specialite')->nullable(); // [cite: 50]
        $table->timestamps(); // [cite: 51]
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('techniciens');
    }
}
