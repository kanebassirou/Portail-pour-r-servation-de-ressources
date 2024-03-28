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
        if (!Schema::hasTable('avis')) {
            Schema::create('avis', function (Blueprint $table) {
                $table->id();
                $table->longText('Commentaire')->nullable();
                $table->foreignId('Ressources_ID_Ressource')->constrained('ressources', 'id'); // Add 'id' as the second argument
                $table->foreignId('Utilisateur_ID_Utilisateur')->constrained('users');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avis');
    }
};
