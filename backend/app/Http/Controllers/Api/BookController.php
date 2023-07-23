<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Book\StoreRequest;
use App\Http\Requests\Api\Book\UpdateRequest;
use App\Http\Resources\Book\BookResource;
use App\Models\Book;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): array
    {
        $books = Book::all();
        return BookResource::collection($books)->resolve();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): array
    {
        $data = $request->validated();

        if(!empty($data['preview_image'])){
            $pathPreviewImage = Storage::disk('local')->put('/preview_images', $data['preview_image']);
            $data['preview_image_url'] = $pathPreviewImage;
        }
        if(!empty($data['main_image'])){
            $pathMainImage = Storage::disk('local')->put('/main_images', $data['main_image']);
            $data['main_image_url'] = $pathMainImage;
        }

        unset($data['main_image'], $data['preview_image']);

        $book = Book::create($data);

        return BookResource::make($book)->resolve();
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book): array
    {
        return BookResource::make($book)->resolve();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Book $book): array
    {
        $data = $request->validated();

        if(!empty($data['preview_image'])){
            $pathPreviewImage = Storage::disk('local')->put('/preview_images', $data['preview_image']);
            $data['preview_image_url'] = $pathPreviewImage;
        }
        if(!empty($data['main_image'])){
            $pathMainImage = Storage::disk('local')->put('/main_images', $data['main_image']);
            $data['main_image_url'] = $pathMainImage;
        }
        unset($data['main_image'], $data['preview_image']);

        $book->update($data);

        return BookResource::make($book)->resolve();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book): \Illuminate\Http\JsonResponse
    {
        $book->delete();

        return response()->json([
            'message' => 'deleted'
        ]);
    }
}
