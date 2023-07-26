<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

/**
 * @OA\Post(
 *     path="/api/login",
 *     summary="Login",
 *     tags={"Auth"},
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                     @OA\Property(property="email", type="string"),
 *                     @OA\Property(property="password", type="string"),
 *                 )
 *             },
 *             example={
 *                  "email": "admin@admin.com",
 *                  "password": "admin",
 *             }
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="Ok",
 *         @OA\JsonContent(
 *                 @OA\Property(property="access_token", type="string", example="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vYmFja2VuZC12dWUubG9jL2FwaS9sb2dpbiIsImlhdCI6MTY5MDM4MjE1MCwiZXhwIjoxNjkwMzg1NzUwLCJuYmYiOjE2OTAzODIxNTAsImp0aSI6IjlwQ1dHSHJ1YnJoVkR3NGIiLCJzdWIiOiIxIiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.AM-aSjjx7aHgF9wjA9Kd_6B3OfSZNTnwTUK82ElXbSA"),
 *                 @OA\Property(property="token_type", type="string", example="bearer"),
 *                 @OA\Property(property="expires_in", type="integer", example="3600"),
 *         ),
 *     ),
 * ),
 */
class AuthController extends Controller
{

}
