<?php

namespace Database\Seeders;

use App\Models\Book;
use Faker\Factory as Faker;
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

        for($i=0; $i< 10; $i++){
            $book = new Book;

            $book->isbn = $faker->randomNumber(6);
            $book->title = $faker->name;
            $book->year = rand(2010,2021);
            $book->publisher_id = rand(1,15);
            $book->author_id = rand(1,30);
            $book->catalog_id = rand(1,12);
            $book->qty = rand(5,30);
            $book->price = rand(50000,100000);

            $book->save();
            
        }
    }
}
