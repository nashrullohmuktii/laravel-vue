<?php

namespace Database\Seeders;

use App\Models\Product;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i = 0; $i < 20; $i++){
            $product    =   new Product;

            $product->name_product  =   $faker->name;
            $product->type_id       =   rand(1,4);
            $product->price         =   rand(5000, 10000);
            $product->qty           =   rand(1,20);
            $product->save();
            
        }
    }
}
