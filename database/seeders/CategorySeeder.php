<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => "PHP",
        ]);

        DB::table('categories')->insert([
            'name' => "JavaScript",
        ]);

        DB::table('categories')->insert([
            'name' => "Langues",
        ]);

        DB::table('categories')->insert([
            'name' => "Base de données",
        ]);

        DB::table('categories')->insert([
            'name' => "Python",
        ]);
    }
}
