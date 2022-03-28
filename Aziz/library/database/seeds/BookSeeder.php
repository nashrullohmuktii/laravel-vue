<?php

use App\Book;
use Faker\factory as Faker;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i=0; $i < 20 ; $i++){
            $book = new Book;

            $book->isbn = $faker->randomNumber(7);
            $book->title = $faker->name;
            $book->year = rand(2021,2022);
            $book->publisher_id = rand(1,20);
            $book->author_id = rand(1,20);
            $book->catalog_id = rand(1,4);
            $book->qty = $faker->randomNumber(1);
            $book->price = rand(5000, 10000);

            $book->save();
        }
    }
}
