<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class ChapterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = new Faker();
        DB::table('chapters')->insert([
            'titre' => "Chapitre 1 : Introduction",
            'content' => 
            "Nous allons découvrir dans ce chapitre un framework de PHP.
            Un framework dans n'importe quel langage nous permet de ne pas partir de rien et avoir certains modules déjà à notre disposition.",
            "formation" => 1
        ]);

        DB::table('chapters')->insert([
            'titre' => "Chapitre 1 : Introduction",
            'content' => 
            "Nous allons découvrir dans ce chapitre un framework de PHP.
            Un framework dans n'importe quel langage nous permet de ne pas partir de rien et avoir certains modules déjà à notre disposition.",
            "formation" => 2
        ]);

        DB::table('chapters')->insert([
            'titre' => "Chapitre 2 : L'installation",
            'content' => 
            "Avant de commencer à utiliser ce framework nous allons d'abord commencer par installer les outils dont nous aurons besoin.",
            "formation" => 2
        ]);

        DB::table('chapters')->insert([
            'titre' => "Chapitre 1 : Conjugaison",
            'content' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tincidunt tempor sapien, in sagittis mauris venenatis ac. Praesent vehicula purus non felis bibendum iaculis. Nam viverra vulputate nibh non rutrum. Nulla volutpat tincidunt lacus eu euismod. Sed commodo ornare odio id aliquam. Phasellus ac nibh eros. Nulla sollicitudin ipsum sit amet rutrum condimentum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Suspendisse fringilla quam nec scelerisque rutrum. Suspendisse potenti. Ut ultrices erat sed iaculis fermentum. Nullam facilisis purus non ante iaculis, ut volutpat tellus facilisis. Fusce ut nunc erat. Sed condimentum dui at mi pellentesque.",
            "formation" => 6
        ]);

        DB::table('chapters')->insert([
            'titre' => "Chapitre 1 : Rappels",
            'content' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tincidunt tempor sapien, in sagittis mauris venenatis ac. Praesent vehicula purus non felis bibendum iaculis. Nam viverra vulputate nibh non rutrum. Nulla volutpat tincidunt lacus eu euismod. Sed commodo ornare odio id aliquam. Phasellus ac nibh eros. Nulla sollicitudin ipsum sit amet rutrum condimentum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Suspendisse fringilla quam nec scelerisque rutrum. Suspendisse potenti. Ut ultrices erat sed iaculis fermentum. Nullam facilisis purus non ante iaculis, ut volutpat tellus facilisis. Fusce ut nunc erat. Sed condimentum dui at mi pellentesque.",
            "formation" => 4
        ]);

        DB::table('chapters')->insert([
            'titre' => "Chapitre 1 : Rappels",
            'content' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tincidunt tempor sapien, in sagittis mauris venenatis ac. Praesent vehicula purus non felis bibendum iaculis. Nam viverra vulputate nibh non rutrum. Nulla volutpat tincidunt lacus eu euismod. Sed commodo ornare odio id aliquam. Phasellus ac nibh eros. Nulla sollicitudin ipsum sit amet rutrum condimentum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Suspendisse fringilla quam nec scelerisque rutrum. Suspendisse potenti. Ut ultrices erat sed iaculis fermentum. Nullam facilisis purus non ante iaculis, ut volutpat tellus facilisis. Fusce ut nunc erat. Sed condimentum dui at mi pellentesque.",
            "formation" => 3
        ]);

        DB::table('chapters')->insert([
            'titre' => "Chapitre 2 : Notions",
            'content' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tincidunt tempor sapien, in sagittis mauris venenatis ac. Praesent vehicula purus non felis bibendum iaculis. Nam viverra vulputate nibh non rutrum. Nulla volutpat tincidunt lacus eu euismod. Sed commodo ornare odio id aliquam. Phasellus ac nibh eros. Nulla sollicitudin ipsum sit amet rutrum condimentum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Suspendisse fringilla quam nec scelerisque rutrum. Suspendisse potenti. Ut ultrices erat sed iaculis fermentum. Nullam facilisis purus non ante iaculis, ut volutpat tellus facilisis. Fusce ut nunc erat. Sed condimentum dui at mi pellentesque.",
            "formation" => 3
        ]);

        DB::table('chapters')->insert([
            'titre' => "Chapitre 3 : Notions",
            'content' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tincidunt tempor sapien, in sagittis mauris venenatis ac. Praesent vehicula purus non felis bibendum iaculis. Nam viverra vulputate nibh non rutrum. Nulla volutpat tincidunt lacus eu euismod. Sed commodo ornare odio id aliquam. Phasellus ac nibh eros. Nulla sollicitudin ipsum sit amet rutrum condimentum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Suspendisse fringilla quam nec scelerisque rutrum. Suspendisse potenti. Ut ultrices erat sed iaculis fermentum. Nullam facilisis purus non ante iaculis, ut volutpat tellus facilisis. Fusce ut nunc erat. Sed condimentum dui at mi pellentesque.",
            "formation" => 2
        ]);

        DB::table('chapters')->insert([
            'titre' => "Chapitre 2 : Pour continuer",
            'content' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tincidunt tempor sapien, in sagittis mauris venenatis ac. Praesent vehicula purus non felis bibendum iaculis. Nam viverra vulputate nibh non rutrum. Nulla volutpat tincidunt lacus eu euismod. Sed commodo ornare odio id aliquam. Phasellus ac nibh eros. Nulla sollicitudin ipsum sit amet rutrum condimentum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Suspendisse fringilla quam nec scelerisque rutrum. Suspendisse potenti. Ut ultrices erat sed iaculis fermentum. Nullam facilisis purus non ante iaculis, ut volutpat tellus facilisis. Fusce ut nunc erat. Sed condimentum dui at mi pellentesque.",
            "formation" => 4
        ]);

        DB::table('chapters')->insert([
            'titre' => "Chapitre 3 : Pour continuer",
            'content' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tincidunt tempor sapien, in sagittis mauris venenatis ac. Praesent vehicula purus non felis bibendum iaculis. Nam viverra vulputate nibh non rutrum. Nulla volutpat tincidunt lacus eu euismod. Sed commodo ornare odio id aliquam. Phasellus ac nibh eros. Nulla sollicitudin ipsum sit amet rutrum condimentum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Suspendisse fringilla quam nec scelerisque rutrum. Suspendisse potenti. Ut ultrices erat sed iaculis fermentum. Nullam facilisis purus non ante iaculis, ut volutpat tellus facilisis. Fusce ut nunc erat. Sed condimentum dui at mi pellentesque. ",
            "formation" => 3
        ]);

        
    }
}
