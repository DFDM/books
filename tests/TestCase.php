<?php

namespace Tests;

use App\Models\Author;
use App\Models\Book;
use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Laravel\Sanctum\Sanctum;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected $seed = true;


    protected function setUp(): void
    {
        parent::setUp();

        Sanctum::actingAs(User::factory()->create());
    }

    protected function createTestBook()
    {
        $testBook = Book::create([
            "title" => 'Zanzibar999556',
            "description" => "Zazad99escription 999 58",
            'cover_url' => fake()->imageUrl(),
            'price' => fake()->numberBetween(100, 20000),
            'quantity' => fake()->numberBetween(0, 50),
        ]);
        $author = Author::first();
        $testBook->authors()->attach($author->id);

        return $testBook;
    }

    protected function checkOrder($array, $key)
    {
        $prevPrice = null;

        foreach ($array as $item) {
            if ($prevPrice !== null && $item[$key] < $prevPrice) {
                return false;
            }

            $prevPrice = $item[$key];
        }

        return true;
    }
}
