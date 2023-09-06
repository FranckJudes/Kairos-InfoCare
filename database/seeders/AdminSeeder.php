<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'lastname' => 'Admin',
            'email' => 'admin@kairos.com',
            'sexe' => '/',
            'cni' => '/',
            'telephone' => '+237 66666666',
            'dateNaissance' => '/',
            'LieuNaissance' => 'Yaounde',
            'password' => bcrypt('`12345`'),
            'photo' => 'assets/img/user.png'
        ]);

        
    }
}
