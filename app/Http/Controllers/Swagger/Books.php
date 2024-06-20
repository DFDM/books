<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

/**
 * @OA\Get(
 *     path="/api/books",
 *     operationId="GetBooks",
 *     tags={"Books"},
 *     summary="Получение списка книг",
 *     description="Получение списка книг, с учетом фильтров: price={asc/desc}, quantity={asc/desc}, title={keyword}, description={keyword}. Можно применять фильтры все сразу. Фильтр цены важнее чем фильтр количества, при активации обоих фильтров цены и количества, сортировка количества вторична и работает при одинаковой цене",
 *     security={{"bearerAuth":{}}},

 *         @OA\Parameter(
 *          name="title",
 *          in="query",
 *          required=false,
 *          @OA\Schema(
 *               type="string"
 *           ),
 *           example="Ключевое слово из названия"
 *          ),
 *           @OA\Parameter(
 *          name="desctiption",
 *          in="query",
 *          required=false,
 *          @OA\Schema(
 *               type="string"
 *           ),
 *           example="Ключевое слово из описания"
 *          ),
 *           @OA\Parameter(
 *          name="price",
 *          in="query",
 *          required=false,
 *          @OA\Schema(
 *               type="string"
 *           ),
 *           example="asc"
 *          ),
 *           @OA\Parameter(
 *          name="quantity",
 *          in="query",
 *          required=false,
 *          @OA\Schema(
 *               type="string"
 *           ),
 *           example="desc"
 *          ),
 *           @OA\Parameter(
 *          name="avatars",
 *          in="query",
 *          required=false,
 *          @OA\Schema(
 *               type="string"
 *           ),
 *           example="true"
 *          ),
 *           @OA\Parameter(
 *          name="orders",
 *          in="query",
 *          required=false,
 *          @OA\Schema(
 *               type="string"
 *           ),
 *           example="asc"
 *          ),
 *           @OA\Parameter(
 *          name="rankOrSalesAbove",
 *          in="query",
 *          required=false,
 *          @OA\Schema(
 *               type="string"
 *           ),
 *           example="true"
 *          ),
 *     @OA\Response(
 *         response="200",
 *         description="Successful response",
 *     @OA\JsonContent(
 *         @OA\Property(property="data", type="array",
 *             @OA\Items(
 *                 @OA\Property(property="id", type="integer"),
 *                 @OA\Property(property="title", type="string"),
 *                 @OA\Property(property="description", type="string"),
 *                 @OA\Property(property="cover_url", type="string"),
 *                 @OA\Property(property="price", type="string"),
 *                 @OA\Property(property="quantity", type="integer"),
 *                 @OA\Property(property="authors", type="array",
 *                     @OA\Items(
 *                          @OA\Property(property="id", type="integer"),
 *                          @OA\Property(property="first_name", type="string"),
 *                          @OA\Property(property="last_name", type="string"),
 *                          @OA\Property(property="rank", type="string"),
 *                          @OA\Property(property="avatar_url", type="string"),
 *                          @OA\Property(property="created_at", type="string", format="date-time"),
 *                          @OA\Property(property="updated_at", type="string", format="date-time"),
 *                          @OA\Property(property="deleted_at", type="string", nullable=true)
 *                      )
 *                 ),
 *                 @OA\Property(property="sales", type="integer"),
 *             )
 *         ),
 *         @OA\Property(property="links", type="object",
 *             @OA\Property(property="first", type="string"),
 *             @OA\Property(property="last", type="string"),
 *             @OA\Property(property="prev", type="string", nullable=true),
 *             @OA\Property(property="next", type="string", nullable=true)
 *         ),
 *         @OA\Property(property="meta", type="object",
 *             @OA\Property(property="current_page", type="integer"),
 *             @OA\Property(property="from", type="integer"),
 *             @OA\Property(property="last_page", type="integer"),
 *             @OA\Property(property="links", type="array",
 *                 @OA\Items(
 *                     @OA\Property(property="url", type="string", nullable=true),
 *                     @OA\Property(property="label", type="string"),
 *                     @OA\Property(property="active", type="boolean")
 *                 )
 *             ),
 *             @OA\Property(property="path", type="string"),
 *             @OA\Property(property="per_page", type="integer"),
 *             @OA\Property(property="to", type="integer"),
 *             @OA\Property(property="total", type="integer")
 *         )
 *     )
 * )
 * )
 **/
class Books extends Controller
{
    // Код контроллера
}
