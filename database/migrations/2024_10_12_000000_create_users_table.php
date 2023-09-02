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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lastname');
            $table->string('sexe');
            $table->string('cni');
            $table->string('telephone');
            $table->string('dateNaissance');
            $table->string('lieuNaissance');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('photo');
            $table->unsignedBigInteger('entite_id')->nullable();         
            $table->timestamps();
            $table->foreign('entite_id')->references('id')->on('entites')->onDelete('cascade')->onUpdate('cascade');
        });
    }   

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
