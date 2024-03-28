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
        if (!Schema::hasTable('reservations')) {
            Schema::create('reservations', function (Blueprint $table) {
                $table->id();
                $table->string('Date_de_début', 45)->nullable();
                $table->string('Date_de_fin', 45)->nullable();
                $table->string('Statut', 45)->nullable();
                
                // Assurez-vous que le type de ces colonnes correspond au type de la colonne `id` dans les tables référencées
                $table->unsignedBigInteger('Ressource_ID_Ressource');
                $table->unsignedBigInteger('Utilisateur_ID_Utilisateur');
                
                // Définition des contraintes de clé étrangère après avoir déclaré les colonnes
                $table->foreign('Ressource_ID_Ressource')->references('id')->on('ressources')->onDelete('cascade');
                $table->foreign('Utilisateur_ID_Utilisateur')->references('id')->on('utilisateurs')->onDelete('cascade');
            
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
