<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('formations')->insert([
            'name' => "Laravel",
            'description' => "Un framework de PHP",
            "image" => "laravel.png",
            "prix" => "10.99",
            'user' => 1
        ]);

        DB::table('formations')->insert([
            'name' => "Symfony",
            'description' => "Un framework de PHP",
            "image" => "symfony.png",
            "prix" => "10.99",
            'user' => 1
        ]);

        DB::table('formations')->insert([
            'name' => "Node JS",
            'description' => "Un framework de JavaScript",
            "image" => "node-js.png",
            "prix" => "7.99",
            'user' => 2
        ]);

        DB::table('formations')->insert([
            'name' => "Angular",
            'description' => "Un framework de JavaScript",
            "image" => "angular.png",
            "prix" => "9.99",
            'user' => 3
        ]);

        DB::table('formations')->insert([
            'name' => "React",
            'description' => "Un framework de JavaScript",
            "image" => "react-js.png",
            "prix" => "7.99",
            'user' => 5
        ]);

        DB::table('formations')->insert([
            'name' => "Anglais",
            'description' => "C'est important d'apprendre d'autres langues",
            "image" => "",
            "prix" => "6.99",
            'user' => 4
        ]);

        // Association des catégories avec les formations
        DB::table('formations_categories')->insert([
            'category' => 1,
            'formation' => 1
        ]);

        DB::table('formations_categories')->insert([
            'category' => 1,
            'formation' => 2
        ]);

        DB::table('formations_categories')->insert([
            'category' => 2,
            'formation' => 3
        ]);

        DB::table('formations_categories')->insert([
            'category' => 2,
            'formation' => 4
        ]);

        DB::table('formations_categories')->insert([
            'category' => 2,
            'formation' => 5
        ]);

        DB::table('formations_categories')->insert([
            'category' => 3,
            'formation' => 6
        ]);

         // Association des types avec les formations
         DB::table('formations_types')->insert([
            'type' => 1, // Débutant
            'formation' => 1 // Laravel
        ]);

        DB::table('formations_types')->insert([
            'type' => 1, // Débutant
            'formation' => 2 // Symfony
        ]);

        DB::table('formations_types')->insert([
            'type' => 3, // Confirmé
            'formation' => 3 // NodeJS
        ]);

        DB::table('formations_types')->insert([
            'type' => 4, // Expert
            'formation' => 4 // Angular
        ]);

        DB::table('formations_types')->insert([
            'type' => 1, // Débutant
            'formation' => 5 // React
        ]);

        DB::table('formations_types')->insert([
            'type' => 1, // Débutant
            'formation' => 6 // Anglais
        ]);
    }
}
