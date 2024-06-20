<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Services\Sales\Service;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $books = \App\Models\Book::factory(30)->create();
        $authors = \App\Models\Author::factory(10)->create();
        $buyers = \App\Models\Buyer::factory(30)->create();
        $sales = \App\Models\Sale::factory(100)->create();

        foreach ($books as $book) {
            $authorsIds = $authors->random(rand(1, 3))->pluck('id');
            $book->authors()->attach($authorsIds);
        }

        foreach ($sales as $sale) {
            $booksIds = $books->random(rand(1, 5))->pluck('id');
            $sale->update(['price' => Service::cost($booksIds)]);
            $sale->books()->attach($booksIds);
        }
    }
}
