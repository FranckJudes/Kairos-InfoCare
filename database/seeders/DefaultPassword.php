<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Passwords;
class DefaultPassword extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Passwords::create([
            'libelle' => 'Mot de Passe',
            'valeur' =>'KairosPassword',
            'description' => 'Mot de Passe des Utilisateurs Kairos',
        ]);
    }
}
