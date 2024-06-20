<?php

namespace Tests\Feature;

use App\Models\Buyer;
use Tests\TestCase;
use App\Models\User;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiSaleTest extends TestCase
{
    use RefreshDatabase;

    public function test_sale_books_post_for_old_buyer(): void
    {
        $buyer = Buyer::first();

        $response = $this
            ->withHeaders(['Accept' => 'application/json'])
            ->postJson(
                '/api/sale',
                [
                    "buyer" => ["id" => $buyer->id],
                    "book_id" => ["9", '4']
                ]
            );

        $response->assertStatus(201)->assertJsonStructure([
            'data' => [
                'id',
                'buyers_id',
                'books' => [
                    '*' => [
                        'id',
                        'title',
                        'description',
                        'cover_url',
                        'price',
                        'quantity'
                    ]
                ],
                'price'
            ]
        ]);
    }

    public function test_sale_books_post_for_new_buyer(): void
    {
        $response = $this
            ->withHeaders(['Accept' => 'application/json'])
            ->postJson(
                '/api/sale',
                ["buyer" => ["name" => "New buyer", "email" => "newemail@bk.ru"], "book_id" => ["9", "10", "11"]]
            );

        $response->assertStatus(201)->assertJsonStructure([
            'data' => [
                'id',
                'buyers_id',
                'books' => [
                    '*' => [
                        'id',
                        'title',
                        'description',
                        'cover_url',
                        'price',
                        'quantity'
                    ]
                ],
                'price'
            ]
        ]);
    }
}
