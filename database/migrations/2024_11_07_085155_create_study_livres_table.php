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
        Schema::create('study_livres', function (Blueprint $table) {
            $table->bigIncrements('id_StudyLivre');
            $table->foreignId('id_Etudiant')->constrained('etudiants', 'id_Etudiant');
            $table->string('titre');
            $table->string('auteur');
            $table->string('genre');
            $table->date('date');
            $table->string('heure_Entrer');
            $table->string('heure_Sortie');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('study_livres');
    }
};
