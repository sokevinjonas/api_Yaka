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
        Schema::create('levels', function (Blueprint $table) {
            $table->id();
            $table->string('word', 12); // Mot à deviner
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->tinyInteger('difficulty')->default(1); // Difficulté de 1 à 5 étoiles
            $table->text('cultural_explanation')->nullable(); // Explication culturelle du mot
            $table->integer('order_in_pack')->default(1); // Ordre du niveau dans son pack
            $table->boolean('is_active')->default(true); // Niveau actif ou non
            $table->timestamps();
            // Index pour optimiser les recherches
            $table->index('category_id');
            $table->index('difficulty');
            $table->index('order_in_pack');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('levels');
    }
};
