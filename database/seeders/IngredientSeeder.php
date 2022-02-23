<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\Ingredient;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for($i =0; $i <4; $i++){
            $rand = rand(1,4);
            for($j =0; $j <$rand; $j++){
                Ingredient::create([
                    'text' => $faker->sentence(1),
                    'recipe_id' => $i+1,
                ]);
            }
        }
    }
}
