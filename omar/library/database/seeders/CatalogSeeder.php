<?php

namespace Database\Seeders;

use App\models\Catalog;
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

        for($i=0; $i < 5; $i++){
            $catalog = new Catelogs;

            $catalog->name = $faker->name;

            $catalog->save();

        }
    }
}
