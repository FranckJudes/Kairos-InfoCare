<?php

use App\Models\PlanClassement;
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
            $table->string('titrePatient')->nullable();
            $table->string('name');
            $table->string('lastname');
            $table->string('sexe');
            $table->string('dateNaissance');
            $table->string('cni')->nullable();
            $table->string('numeroTelephone')->nullable();
            $table->string('IdentiteGenre')->nullable();
            $table->string('OrientationSexuel')->nullable();
            // Contact
            $table->string('adresse')->nullable();
            $table->string('codePostal')->nullable();
            $table->string('nomMere')->nullable();
            $table->string('region')->nullable();
            $table->string('TelephoneUrgence')->nullable();
            $table->string('TelephoneProfessionel')->nullable();
            // $table->string('courriel')->nullable();
            $table->string('emailDuContact')->nullable();
            // 
            $table->string('AntecedentMedicaux')->nullable();
            $table->string('allergie')->nullable();
            $table->string('chirugieAnterieurs')->nullable();
            $table->string('MedicamentsActuel')->nullable();
            $table->string('ProblemeSante')->nullable();
            $table->string('HistoriqueVaccination')->nullable();
            $table->string('resultatTestMedicaux')->nullable();
            // $table->string('');
            // $table->string('');
            // $table->string('');

            // // Choix
            // $table->string('');
            // $table->string('');
            // $table->string('');
            // $table->string('');
            // $table->string('');
            // $table->string('');
             // Employeur
             $table->string('nomEmployeur')->nullable();
             $table->string('contactEmployeur')->nullable();
            //  $table->string('');
            //  $table->string('');
            //  $table->string('');
            //  $table->string('');
            //   // Employeur
            //   $table->string('');
            //   $table->string('');
            //   $table->string('');
            //   $table->string('');
            //   $table->string('');
            //   $table->string('');
            //  Date de Deces 
            $table->string('dateDeces')->nullable();
            $table->string('raisonDeces')->nullable();
            // Gardien du Patient
            $table->string('nomGuardian')->nullable();
            $table->string('LienParent')->nullable();
            $table->string('AdresseLienParente')->nullable();
            $table->string('TelephoneProfessionelLienParente')->nullable();
            $table->string('CourrielLienParente')->nullable();
            $table->string('villeLienParente')->nullable();
            $table->string('codePostalLienParente')->nullable();
            $table->string('sexeParente')->nullable();
            $table->string('emailGardien')->nullable();
            // Assurance du Patient
            $table->string('numeroPoliceAssurance')->nullable();
            $table->string('detailAssuranceMedicale')->nullable();
            $table->string('dateExpirationAssurance')->nullable();
            $table->string('coordonneAssurance')->nullable();
            // $table->string('');
            // $table->string('');
        

            // 
            $table->foreignIdFor(PlanClassement::class);        

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
