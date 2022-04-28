<?php

namespace Database\Seeders;

use App\Models\Type;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i = 0; $i < 4; $i++){
            $type    =   new Type;

            $type->name          =   $faker->name;
            $type->code         =   rand(1,4);
            $type->suplier_id    =   rand(1,4);

            $type->save();
            
        }
    }
}
