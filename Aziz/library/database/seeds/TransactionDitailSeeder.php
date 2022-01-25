<?php

use App\TransactionDitail;
use Faker\factory as Faker;
use Illuminate\Database\Seeder;

class TransactionDitailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i=0; $i < 10; $i++){
            $transactionditail = new TransactionDitail;

            $transactionditail->transaction_id = rand(1,10);
            $transactionditail->book_id = rand(1,20);

            $transactionditail->save();
        }
    }
}
