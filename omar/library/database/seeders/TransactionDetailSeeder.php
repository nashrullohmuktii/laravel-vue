<?php

namespace Database\Seeders;

use App\Models\TransactionDetail;
use Faker\factory as Faker;
use Illuminate\Database\Seeder;

class TransactionDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i=0; $i < 12; $i++){
            $td = new TransactionDetail;

            $td->transaction_id = rand(1, 10);
            $td->book_id = rand(1,21);
            $td->qty = rand(1,4);

            $td->save();
        }
    }
}
