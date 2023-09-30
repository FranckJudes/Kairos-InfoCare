<?php

use App\Models\Patients;
use App\Models\PlanClassement;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_files', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(PlanClassement::class)->constrained('plan_classements')->onDelete('cascade');     
            $table->foreignIdFor(Patients::class)->constrained('patients')->onDelete('cascade');       
            $table->string('filename');
            $table->string('filepath');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient_files');
    }
};
