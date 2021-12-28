<?php

namespace Database\Seeders;
use App\Models\Publisher;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();
        for ($i=0; $i < 20; $i++) { 
            $pub = new Publisher;

            $pub->name = $faker->name;
            $pub->phone_number = '0822'.$faker->randomNumber(8);  
            $pub->address = $faker->address; 
            $pub->email = $faker->email;
            $pub->save();
        }
    }
}
