<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\Recipe;

class RecipeSeeder extends Seeder
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
            Recipe::create([
                'title' => $faker->sentence(3),
                'description' => $faker->sentence(rand(5,7)),
                'image' => "pizza.jpg",
                'user_id' => $i+1,
                'prepTime' => "20",
                'category_id' => $i+1,
            ]);
        }

    }
}
