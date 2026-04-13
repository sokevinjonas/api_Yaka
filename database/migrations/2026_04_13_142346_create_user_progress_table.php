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
        Schema::create('user_progress', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Clé étrangère vers l'utilisateur
            $table->foreignId('level_id')->constrained()->onDelete('cascade'); // Clé étrangère vers le niveau
            
            // Statut du niveau
            $table->boolean('is_completed')->default(false);
            $table->boolean('is_unlocked')->default(false);

            // Tentatives et indices
            $table->integer('attempts')->default(0);
            $table->integer('hints_used')->default(0);
            
            // Temps passé (optionnel, en secondes)
            $table->integer('time_spent')->default(0);
            
            // Date de complétion
            $table->timestamp('completed_at')->nullable();
            
            $table->timestamps();
            
            // Un utilisateur ne peut avoir qu'une seule entrée par niveau
            $table->unique(['user_id', 'level_id']);
            
            // Index pour optimiser
            $table->index('user_id');
            $table->index('level_id');
            $table->index('is_completed');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_progress');
    }
};
