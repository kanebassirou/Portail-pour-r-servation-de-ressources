<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservations_rallonges', function (Blueprint $table) {
            $table->id();
            $table->date('date_de_reservation')->nullable();
            $table->time('heure_de_debut')->nullable();
            $table->time('heure_de_fin')->nullable();

            // Assurez-vous que le type de ces colonnes correspond au type de la colonne `id` dans les tables référencées
            $table->unsignedBigInteger('Rallonge_ID');
            $table->unsignedBigInteger('Utilisateur_ID');

            // Définition des contraintes de clé étrangère après avoir déclaré les colonnes
            $table->foreign('Rallonge_ID')->references('id')->on('rallonges')->onDelete('cascade');
            $table->foreign('Utilisateur_ID')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_reservations_rallonge');
    }
};
