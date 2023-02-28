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
        Schema::create('idea_categorie', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idea_id');
            $table->unsignedBigInteger('categorie_id');
            $table->timestamps();

            $table->foreign('idea_id')
                ->references('id')
                ->on('ideas')
                ->onDelete('cascade');

            $table->foreign('categorie_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pivots');
    }
};
