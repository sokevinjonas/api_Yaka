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
        Schema::create('level_images', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('level_id')->constrained()->onDelete('cascade');  // Clé étrangère vers le niveau
            $table->string('image_url'); // URL ou chemin de l'image (stockée sur serveur ou CDN)
            $table->tinyInteger('position')->default(1); // Position de l'image (1, 2, 3, 4)
            $table->boolean('is_hidden_by_default')->default(false); // Est-ce que cette image est cachée par défaut ?
            $table->timestamps();
            // Index
            $table->index('level_id');
            $table->index('position');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('level_images');
    }
};
