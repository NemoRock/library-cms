<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

/**
 * @OA\Post(
 *     path="/api/books",
 *     summary="Create",
 *     tags={"Books"},
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                     @OA\Property(property="", type="array", @OA\Items(
 *                          @OA\Property(property="title", type="string"),
 *                          @OA\Property(property="slug", type="string"),
 *                          @OA\Property(property="author", type="string"),
 *                          @OA\Property(property="description", type="string"),
 *                          @OA\Property(property="rating", type="integer"),
 *                          @OA\Property(property="preview_image", type="string"),
 *                          @OA\Property(property="main_image", type="string"),
 *                          @OA\Property(property="category_ids", type="string"),
 *                     )),
 *                 )
 *             },
 *             example={
 *                      "title": "Some title",
 *                      "slug": "Some slug",
 *                      "author": "Some author",
 *                      "description": "Some description",
 *                      "rating": 10,
 *             }
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Ok",
 *         @OA\JsonContent(
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="title", type="string", example="Some title"),
 *                 @OA\Property(property="slug", type="string", example="Some slug"),
 *                 @OA\Property(property="author", type="string", example="Some author"),
 *                 @OA\Property(property="description", type="string", example="Some description"),
 *                 @OA\Property(property="rating", type="integer", example=10),
 *                 @OA\Property(property="preview_image_url", type="string", example=null),
 *                 @OA\Property(property="main_image_url", type="string", example=null),
 *                 @OA\Property(property="category_ids", type="string", example=null),
 *                 @OA\Property(property="created_at", type="string", example="2023-07-25"),
 *                 @OA\Property(property="updated_at", type="string", example="2023-07-25"),
 *         ),
 *     ),
 * ),
 *
 *
 *@OA\Get(
 *     path="/api/books",
 *     summary="List",
 *     tags={"Books"},
 *
 *     @OA\Response(
 *         response=200,
 *         description="Ok",
 *         @OA\JsonContent(
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="title", type="string", example="Some title"),
 *                 @OA\Property(property="slug", type="string", example="Some slug"),
 *                 @OA\Property(property="author", type="string", example="Some author"),
 *                 @OA\Property(property="description", type="string", example="Some description"),
 *                 @OA\Property(property="rating", type="integer", example=10),
 *                 @OA\Property(property="preview_image_url", type="string", example=null),
 *                 @OA\Property(property="main_image_url", type="string", example=null),
 *                 @OA\Property(property="category_ids", type="string", example=null),
 *                 @OA\Property(property="created_at", type="string", example="2023-07-25"),
 *                 @OA\Property(property="updated_at", type="string", example="2023-07-25"),
 *         ),
 *     ),
 * ),
 *
 *
 *
 *@OA\Get(
 *     path="/api/books/{book}",
 *     summary="Book",
 *     tags={"Books"},
 *
 *     @OA\Parameter (
 *         description="ID book",
 *         in="path",
 *         name="book",
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
 *                 @OA\Property(property="author", type="string", example="Some author"),
 *                 @OA\Property(property="description", type="string", example="Some description"),
 *                 @OA\Property(property="rating", type="integer", example=10),
 *                 @OA\Property(property="preview_image_url", type="string", example=null),
 *                 @OA\Property(property="main_image_url", type="string", example=null),
 *                 @OA\Property(property="category_ids", type="string", example=null),
 *                 @OA\Property(property="created_at", type="string", example="2023-07-25"),
 *                 @OA\Property(property="updated_at", type="string", example="2023-07-25"),
 *             ),
 *         ),
 *     ),
 * ),
 *
 *
 *@OA\Patch(
 *     path="/api/books/{book}",
 *     summary="Update",
 *     tags={"Books"},
 *
 *     @OA\Parameter (
 *         description="ID book",
 *         in="path",
 *         name="book",
 *         required=true,
 *         example=2
 *     ),
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                          @OA\Property(property="title", type="string", example="Some title for edit"),
 *                          @OA\Property(property="slug", type="string", example="Some slug for edit"),
 *                          @OA\Property(property="author", type="string", example="Some author for edit"),
 *                          @OA\Property(property="description", type="string", example="Some description for edit"),
 *                          @OA\Property(property="rating", type="integer", example=9),
 *                 )
 *             }
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Ok",
 *         @OA\JsonContent(
 *             @OA\Property(property="data", type="object",
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="title", type="string", example="Some title"),
 *                 @OA\Property(property="slug", type="string", example="Some slug"),
 *                 @OA\Property(property="author", type="string", example="Some author"),
 *                 @OA\Property(property="description", type="string", example="Some description"),
 *                 @OA\Property(property="rating", type="integer", example=9),
 *                 @OA\Property(property="preview_image_url", type="string", example=null),
 *                 @OA\Property(property="main_image_url", type="string", example=null),
 *                 @OA\Property(property="category_ids", type="string", example=null),
 *                 @OA\Property(property="created_at", type="string", example="2023-07-25"),
 *                 @OA\Property(property="updated_at", type="string", example="2023-07-25"),
 *             ),
 *         ),
 *     ),
 * ),
 *
 *
 *@OA\Delete(
 *     path="/api/books/{book}",
 *     summary="Delete",
 *     tags={"Books"},
 *
 *     @OA\Parameter (
 *         description="ID book",
 *         in="path",
 *         name="book",
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

// TODO finish with links to categories
class BookController extends Controller
{

}
