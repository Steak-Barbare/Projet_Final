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
        Schema::create('gestion_identites', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['M365','Google Workspace', 'Microsoft Exchange', 'Autres'])->nullable();
            $table->timestamps();
            $table->foreignId('entreprise_id')->constrained('entreprises');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gestion_identites');
    }
};
