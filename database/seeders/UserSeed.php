<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
                'nom'=>"souzane",
                'prenom'=>"daidine",
                'matricule'=>589,
                'telephone'=>"0345669874",
                'profession'=>"etudiant",
                'email'=>"souzane@gmail.com",
                'password'=>Hash::make("123456"),
            ]
        );
    }
}
