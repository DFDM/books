<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

/**
 * @OA\Info(
 *    title="Gigco REST API",
 *    version="1.0.0",
 *
 *    @OA\Contact(
 *     email="support@gigqo.com",
 *     name="Support Team"
 *   )
 * )
 * @OA\PathItem(
 *  path="api"
 * )
 *
 * @OA\Compontents(
 *  @OA\SecurityScheme(
 *      securityScheme="bearerAuth",
 *      type="http",
 *      scheme="bearer"
 *  )
 * )
 *
 */
class MainController extends Controller
{
    //
}
