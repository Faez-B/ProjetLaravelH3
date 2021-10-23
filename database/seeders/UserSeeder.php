<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Création du compte admin
        // Le mot de passe est le résultat de bcrypt("admin") 
        DB::table('users')->insert([
            'firstname' => "admin",
            'lastname' => "admin",
            "role" => "admin",
            "status" => "valide",
            'email' => "admin@admin.com",
            'password' => "$2y$10$8UYBJmkZWGPonX8s/738neplKlMJYo6MGDq9Zp3R2lhWLCPCYLdOG",
        ]);
    }
}
