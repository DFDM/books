<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

/**
 * @OA\Post(
 *     path="/api/access-tokens",
 *     operationId="CreateAuthToken",
 *     tags={"Auth"},
 *     summary="Получение bearer токена",
 *     description="Получение bearer токена авторизации по email, паролю",
 *      @OA\Parameter(
*          name="email",
*          in="query",
*          required=true,
*          @OA\Schema(
*               type="string"
*          )
*       ),
 *      @OA\Parameter(
*          name="password",
*          in="query",
*          required=true,
*          @OA\Schema(
*               type="string"
*          )
*       ),
 *     @OA\Response(
 *         response="200",
 *         description="Response Message",
 *         @OA\JsonContent(
 *                  @OA\Property(property="token", type="string", example="1|wN9OyREdhoYsZZ94Zyi6V******fePRo4raS96rMc0e51c61"),
 *         )
 *     )
 * )
 * 
 *  @OA\Delete(
 *     path="/api/access-tokens",
 *     operationId="DeleteAuthToken",
 *     tags={"Auth"},
 *     summary="Удаление текущего bearer токена",
 *     description="Удаление текущего bearer токена текущей авторизации",
 *     @OA\Response(
 *         response="401",
 *         description="Response Message",
 *         @OA\JsonContent(
 *                  @OA\Property(property="message", type="string", example="Unauthenticated."),
 *         )
 *     )
 * )
 * 
 */
class Auth extends Controller
{
    // Код контроллера
}
