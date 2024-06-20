<?php

namespace Tests\Feature;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class ApiBookTest extends TestCase
{

    use RefreshDatabase;

    public function test_api_books_get_all(): void
    {
        $response = $this->withHeaders(['Accept' => 'application/json'])->get('/api/books');

        $response->assertStatus(200);
        $response->assertStatus(200)->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'title',
                    'description',
                    'cover_url',
                    'price',
                    'quantity'
                ]
            ],
        ]);
    }

    public function test_api_books_get_filtered_by_title(): void
    {

        $testBook = $this->createTestBook();
        $response = $this->withHeaders(['Accept' => 'application/json'])->get('/api/books/?title=Zanzibar999556');

        $response->assertStatus(200);
        $response->assertJson([
            "data" => [
                [
                    "id" => $testBook->id,
                    "title" => $testBook->title,
                    "description" => $testBook->description,
                    "cover_url" => $testBook->cover_url,
                    "price" => $testBook->price,
                    "quantity" => $testBook->quantity
                ]
            ]
        ]);
    }

    public function test_api_books_get_filtered_by_description(): void
    {
        $testBook = $this->createTestBook();
        $response = $this->withHeaders(['Accept' => 'application/json'])->get('/api/books/?description=Zazad99escription');

        $response->assertStatus(200);
        $response->assertJson([
            "data" => [
                [
                    "id" => $testBook->id,
                    "title" => $testBook->title,
                    "description" => $testBook->description,
                    "cover_url" => $testBook->cover_url,
                    "price" => $testBook->price,
                    "quantity" => $testBook->quantity
                ]
            ]
        ]);
    }

    public function test_api_books_get_filtered_by_title_description(): void
    {
        $testBook = $this->createTestBook();
        $response = $this->withHeaders(['Accept' => 'application/json'])->get('/api/books/?description=Zazad99escription&title=Zanzibar999556');

        $response->assertStatus(200);
        $response->assertJson([
            "data" => [
                [
                    "id" => $testBook->id,
                    "title" => $testBook->title,
                    "description" => $testBook->description,
                    "cover_url" => $testBook->cover_url,
                    "price" => $testBook->price,
                    "quantity" => $testBook->quantity
                ]
            ]
        ]);

        $response->assertStatus(200);
    }

    public function test_api_books_get_sort_by_asc_price(): void
    {

        $response = $this->withHeaders(['Accept' => 'application/json'])->get('/api/books/?price=asc');

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/json');
        $this->checkOrder($response->json()['data'], 'price') ? $this->assertTrue(true) : $this->assertTrue(false);
    }

    public function test_api_books_get_sort_by_desc_price(): void
    {

        $response = $this->withHeaders(['Accept' => 'application/json'])->get('/api/books/?price=desc');

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/json');
        !$this->checkOrder($response->json()['data'], 'price') ? $this->assertTrue(true) : $this->assertTrue(false);
    }

    public function test_api_books_get_sort_by_asc_quantity(): void
    {

        $response = $this->withHeaders(['Accept' => 'application/json'])->get('/api/books/?quantity=asc');
        $response->assertStatus(200);
        $this->checkOrder($response->json()['data'], 'quantity') ? $this->assertTrue(true) : $this->assertTrue(false);
    }

    public function test_api_books_get_sort_by_desc_quantity(): void
    {

        $response = $this->withHeaders(['Accept' => 'application/json'])->get('/api/books/?quantity=desc');
        $response->assertStatus(200);
        !$this->checkOrder($response->json()['data'], 'quantity') ? $this->assertTrue(true) : $this->assertTrue(false);
    }
}
