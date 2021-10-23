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
            'name' => "Symfony",
        ]);

        DB::table('categories')->insert([
            'name' => "Laravel",
        ]);

        DB::table('categories')->insert([
            'name' => "React",
        ]);

        DB::table('categories')->insert([
            'name' => "Anglais",
        ]);

        DB::table('categories')->insert([
            'name' => "Python",
        ]);
    }
}
