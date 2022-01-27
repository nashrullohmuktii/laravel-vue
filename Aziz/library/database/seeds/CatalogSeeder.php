<?php

use App\Catalog;
use Faker\factory as Faker;
use Illuminate\Database\Seeder;

class CatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i=0; $i<4; $i++){ 
            $catalog = new Catalog;

            $catalog->name = $faker->name;


            $catalog->save();
        }
    }
}
