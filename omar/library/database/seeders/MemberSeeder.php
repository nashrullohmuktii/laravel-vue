<?php

namespace Database\Seeders;

use App\models\Member;
use Faker\factory as Faker;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i=0; $i < 20; $i++){
            $member = new Members;

            $member->name = $faker->name;
            $member->gender = rand(m,f);
            $member->phone_number = '0812'.$faker->randomNumber(8);
            $member->address = $faker->address;
            $member->email = $faker->email;

            $member->save();
        }
    }
}
