<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type')->insert([
            'name' => "Débutant",
        ]);

        DB::table('type')->insert([
            'name' => "Avancé",
        ]);

        DB::table('type')->insert([
            'name' => "Confirmé",
        ]);

        DB::table('type')->insert([
            'name' => "Expert",
        ]);
    }
}
