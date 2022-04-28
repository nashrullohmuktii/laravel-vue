<?php

namespace Database\Seeders;

use App\Models\Customer;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
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
            $customer               =   new Customer;

            $customer->name         =   $faker->name;
            $customer->gender       =   $faker->randomElement(['M','F']);
            $customer->phone_number =   '0821'.$faker->randomNumber(8);
            $customer->address      =   $faker->address;
            $customer->email        =   $faker->email;

            $customer->save();
        }
    }
}
