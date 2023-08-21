<?php

use App\Models\Entreprise;
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
        Schema::create('stockages', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['HDD','One Drive', 'Dropbox', 'Non Maîtrisé', 'Autres'])->nullable();
            $table->timestamps();           
            $table->foreignId('entreprise_id')->constrained('entreprises');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stockages');
    }
};
