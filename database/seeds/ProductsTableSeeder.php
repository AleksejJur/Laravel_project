<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i=0; $i < 5 ; $i++) { 
            $product = new Product();
            $product->title = $faker->isbn10;
            $product->price = $faker->randomDigitNotNull;
            $product->description = $faker->sentence($nbWords = 7, $variableNbWords = true);
            $product->size = $faker->numberBetween($min = 1, $max = 10);
            $product->manufacturer = $faker->catchPhrase;
            $product->material = $faker->colorName;
            $product->save();
        }
    }
}
