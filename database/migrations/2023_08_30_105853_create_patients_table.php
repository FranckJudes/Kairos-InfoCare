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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            // Personal Info
            $table->string('name');
            $table->string('lastname');
            $table->string('sexe');
            $table->string('dateNaissance');
            $table->string('OrientationSexuel');
            $table->string('GenreIdentite');
            $table->string('telephone');
            $table->string('carteIdentite');
            $table->string('titre');
            // Contact
            $table->string('adresse');
            $table->string('codePostal');
            $table->string('nomMere');
            $table->string('region');
            $table->string('NumeroUrgence');
            $table->string('NumeroProfessionel');
            $table->string('courriel');
            $table->string('');
            $table->string('');
            // Choix
            $table->string('');
            $table->string('');
            $table->string('');
            $table->string('');
            $table->string('');
            $table->string('');
             // Employeur
             $table->string('');
             $table->string('');
             $table->string('');
             $table->string('');
             $table->string('');
             $table->string('');
              // Employeur
              $table->string('');
              $table->string('');
              $table->string('');
              $table->string('');
              $table->string('');
              $table->string('');
            //  Date de Deces 
            $table->string('dateDeces');
            $table->string('raisonDeces');
            // Gardien du Patient
            $table->string('nameGardien');
            $table->string('LienParenteGardien');
            $table->string('sexeGardien');
            $table->string('adresseGardien');
            $table->string('villeGardien');
            $table->string('emailGardien');
            $table->string('codePostalGardien');
            $table->string('TelephoneGardien');
            // Assurance du Patient
            $table->string('');
            $table->string('');
            $table->string('');
            $table->string('');
            $table->string('');
            $table->string('');
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
