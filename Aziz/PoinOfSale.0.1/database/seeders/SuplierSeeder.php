<?php

namespace Database\Seeders;

use App\Models\Suplier;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class SuplierSeeder extends Seeder
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
            $suplier               =   new Suplier;

            $suplier->name         =   $faker->name;
            $suplier->phone_number =   '0821'.$faker->randomNumber(8);
            $suplier->address      =   $faker->address;
            $suplier->email        =   $faker->email;

            $suplier->save();
        }
    }
}
