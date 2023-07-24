<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

/**
 * @OA\Post(
 *     path="/api/categories",
 *     summary="Create",
 *     tags={"Category"},
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                     @OA\Property(property="", type="array", @OA\Items(
 *                          @OA\Property(property="title", type="string"),
 *                          @OA\Property(property="slug", type="string"),
 *                     )),
 *                 )
 *             },
 *             example={
 *                  "title": "Some title",
 *                  "slug": "Some slug",
 *             }
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="Ok",
 *         @OA\JsonContent(
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="title", type="string", example="Some title"),
 *                 @OA\Property(property="slug", type="string", example="Some slug"),
 *                 @OA\Property(property="created_at", type="string", example="2023-07-24"),
 *                 @OA\Property(property="updated_at", type="string", example="2023-07-24"),
 *         ),
 *     ),
 * ),
 *
 *
 *@OA\Get(
 *     path="/api/categories",
 *     summary="List",
 *     tags={"Category"},
 *
 *     @OA\Response(
 *         response=200,
 *         description="Ok",
 *         @OA\JsonContent(
 *             @OA\Property(property="data", type="array", @OA\Items(
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="title", type="string", example="Some title"),
 *                 @OA\Property(property="slug", type="string", example="Some slug"),
 *                 @OA\Property(property="created_at", type="string", example="2023-07-24"),
 *                 @OA\Property(property="updated_at", type="string", example="2023-07-24"),
 *             )),
 *         ),
 *     ),
 * ),
 *
 *
 *@OA\Get(
 *     path="/api/categories/{category}",
 *     summary="Category",
 *     tags={"Category"},
 *
 *     @OA\Parameter (
 *         description="ID category",
 *         in="path",
 *         name="category",
 *         required=true,
 *         example=2
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Ok",
 *         @OA\JsonContent(
 *             @OA\Property(property="data", type="object",
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="title", type="string", example="Some title"),
 *                 @OA\Property(property="slug", type="string", example="Some slug"),
 *                 @OA\Property(property="created_at", type="string", example="2023-07-24"),
 *                 @OA\Property(property="updated_at", type="string", example="2023-07-24"),
 *             ),
 *         ),
 *     ),
 * ),
 *
 *
 *@OA\Patch(
 *     path="/api/categories/{category}",
 *     summary="Update",
 *     tags={"Category"},
 *
 *     @OA\Parameter (
 *         description="ID category",
 *         in="path",
 *         name="category",
 *         required=true,
 *         example=2
 *     ),
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                     @OA\Property(property="title", type="string", example="Some title for edit"),
 *                     @OA\Property(property="slug", type="string", example="Some slug for edit"),
 *                 )
 *             }
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="Ok",
 *         @OA\JsonContent(
 *              @OA\Property(property="id", type="integer", example=1),
 *              @OA\Property(property="title", type="string", example="Some title for edit"),
 *              @OA\Property(property="slug",  type="string", example="Some slug for edit"),
 *              @OA\Property(property="created_at", type="string", example="2023-07-24"),
 *              @OA\Property(property="updated_at", type="string", example="2023-07-24"),
 *         ),
 *     ),
 * ),
 *
 *
 *@OA\Delete(
 *     path="/api/categories/{category}",
 *     summary="Delete",
 *     tags={"Category"},
 *
 *     @OA\Parameter (
 *         description="ID category",
 *         in="path",
 *         name="category",
 *         required=true,
 *         example=2
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Ok",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="deleted"),
 *         ),
 *     ),
 * ),
 */
class CategoryController extends Controller
{

}
