<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

/**
 * @OA\Post(
 *     path="/api/sale",
 *     operationId="CreateSale",
 *     tags={"Sale"},
 *     summary="Создание продажи книги",
 *     description="Endpoint для прожажи книги. Создание записи в БД о продаже книги.",
 *     security={{"bearerAuth":{}}},
 *     @OA\RequestBody(
 *          @OA\JsonContent(
 *              allOf={
 *                  @OA\Schema(
 *                      @OA\Property(
 *                           property="buyer",
 *                           type="object",
 *                           @OA\Property(property="id", type="integer", example="13")
 *                      ),
 *                      @OA\Property(
 *                          property="book_id",
 *                          type="integer",
 *                          example={13, 14, 15}
 *                      )
 *                  )
 *              },

 *          )
 *     ),
 *     @OA\Response(
 *         response="201",
 *         description="Response Message",
 *         @OA\JsonContent(
 *              @OA\Property(property="data", type="object",
 *                  @OA\Property(property="id", type="integer", example="1"),
 *                  @OA\Property(property="buyers_id", type="integer", example="1"),
 *                  @OA\Property(property="books", type="array", @OA\Items(
 *                       @OA\Property(property="id", type="integer", example="19"),
 *                       @OA\Property(property="title", type="string", example="Title"),
 *                       @OA\Property(property="description", type="string", example="Same description"),
 *                       @OA\Property(property="cover_url", type="string", example="/storage/uploads/vf9A30PQr1t4HSpQ7RswYqevs0Aa0hnwHyUBCoaV.png"),
 *                       @OA\Property(property="price", type="string", example="1000"),
 *                       @OA\Property(property="quantity", type="integer", example="10"),
 *                  )),
 *                  @OA\Property(property="price", type="integer", example="22374")
 *              ),
 *
 *         )
 *     )
 * )
 */
class Sales extends Controller
{
    // Код контроллера
}
