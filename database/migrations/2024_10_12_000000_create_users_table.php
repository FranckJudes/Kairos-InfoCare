<?php

use App\Models\Entites;
use App\Models\Groupes;
use App\Models\User;
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
            $table->string('photo')->nullable();
            $table->boolean('password_changed')->default(false);
            $table->timestamps();
        });

        Schema::create('entite_user',function(Blueprint $table){
            $table->foreignIdFor(Entites::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->primary(['entites_id','user_id']);
        });
        Schema::create('groupe_user',function(Blueprint $table){
            $table->foreignIdFor(Groupes::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->primary(['groupes_id','user_id']);
        });
    }   

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entite_user');
        Schema::dropIfExists('groupe_user');    
        Schema::dropIfExists('users');
    }
};
