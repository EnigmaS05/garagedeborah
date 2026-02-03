<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReparationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('reparations', function (Blueprint $table) {
        $table->id(); // PK [cite: 53]
        
        // Clé étrangère Vehicule (Suppression en cascade demandée par le PDF) [cite: 54]
        $table->foreignId('vehicule_id')
              ->constrained('vehicules')
              ->onUpdate('cascade')
              ->onDelete('cascade');

        // Clé étrangère Technicien (Set Null demandé par le PDF) [cite: 69-70]
        $table->foreignId('technicien_id')
              ->nullable()
              ->constrained('techniciens')
              ->onUpdate('cascade')
              ->onDelete('set null');

        $table->date('date'); // [cite: 71]
        $table->integer('duree_main_oeuvre')->nullable(); // [cite: 72]
        $table->text('objet_reparation'); // [cite: 72]
        $table->enum('statut', ['En attente', 'En cours', 'Terminé'])->default('En attente'); // Pour le dashboard
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
        Schema::dropIfExists('reparations');
    }
}
