<?php

namespace tests\Feature\Api;

use App\Models\Book;
use Illuminate\Http\Testing\File;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class BookTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Storage::fake('local');
        $this->withHeaders([
            'accept' => 'application/json'
        ]);
    }

    /**
     * @test
     */
    public function a_book_can_be_stored()
    {
        $this->withoutExceptionHandling();

        $filePreviewImage = File::create('my_preview_image.jpg');
        $fileMainImage = File::create('my_main_image.jpg');

        $data = [
            'title' => 'Some title',
            'slug' => 'Some slug',
            'author' => 'Some author',
            'description' => 'Some description',
            'rating' => 10,
            'preview_image' => $filePreviewImage,
            'main_image' => $fileMainImage,
        ];

        $res = $this->post('/api/books', $data);

        $this->assertDatabaseCount('books', 1);

        $book = Book::first();

        $this->assertEquals($data['title'], $book->title);
        $this->assertEquals($data['slug'], $book->slug);
        $this->assertEquals($data['author'], $book->author);
        $this->assertEquals($data['description'], $book->description);
        $this->assertEquals($data['rating'], $book->rating);
        $this->assertEquals('preview_images/' . $filePreviewImage->hashName(), $book->preview_image_url);
        $this->assertEquals('main_images/' . $fileMainImage->hashName(), $book->main_image_url);

        Storage::disk('local')->assertExists($book->preview_image_url);
        Storage::disk('local')->assertExists($book->main_image_url);

        $res->assertJson([
            'id' => $book->id,
            'title' => $book->title,
            'slug' => $book->slug,
            'author' => $book->author,
            'description' => $book->description,
            'rating' => $book->rating,
            'preview_image_url' => $book->preview_image_url,
            'main_image_url' => $book->main_image_url,
            'created_at' => $book->created_at->format('Y-m-d'),
            'updated_at' => $book->updated_at->format('Y-m-d'),
        ]);
    }


    /**
     * @test
     */
    public function attribute_title_is_required_for_storing_book()
    {
        $data = [
            'title' => '',
            'slug' => 'Some slug',
            'author' => 'Some author',
            'description' => 'Some description',
            'rating' => 10,
            'preview_image' => '',
            'main_image' => '',
        ];

        $res = $this->post('/api/books', $data);

        $res->assertStatus(422);
        $res->assertInvalid('title');
    }


    /**
     * @test
     */
    public function attribute_main_image_is_file_for_storing_book()
    {
        $data = [
            'title' => 'Some title',
            'slug' => 'Some slug',
            'author' => 'Some author',
            'description' => 'Some description',
            'rating' => 10,
            'preview_image' => '',
            'main_image' => 'Some images',
        ];

        $res = $this->post('api/books', $data);

        $res->assertStatus(422);
        $res->assertInvalid('main_image');
        $res->assertJsonValidationErrors([
            'main_image' => 'The main image field must be a file.'
        ]);
    }


    /**
     * @test
     */
    public function a_book_can_be_updated()
    {
        $this->withoutExceptionHandling();

        $book = Book::factory()->create();
        $filePreviewImage = File::create('preview_image.jpg');
        $fileMainImage = File::create('main_image.jpg');

        $data = [
            'title' => 'Some title',
            'slug' => 'Some slug',
            'author' => 'Some author',
            'description' => 'Some description',
            'rating' => 10,
            'preview_image' => $filePreviewImage,
            'main_image' => $fileMainImage,
        ];

        $res = $this->patch('/api/books/' . $book->id, $data);

        $res->assertJson([
            'id' => $book->id,
            'title' => $data['title'],
            'slug' => $data['slug'],
            'author' => $data['author'],
            'description' => $data['description'],
            'rating' => $data['rating'],
            'preview_image_url' => 'preview_images/' . $filePreviewImage->hashName(),
            'main_image_url' => 'main_images/' . $fileMainImage->hashName(),
        ]);
    }


    /**
     * @test
     */
    public function response_for_route_books_index_is_view_book_index_with_books()
    {
        $this->withoutExceptionHandling();

        $books = Book::factory(10)->create();

        $res = $this->get('/api/books');

        $res->assertOk();

        $json = $books->map(function ($book){
            return [
                'id' => $book->id,
                'title' => $book->title,
                'slug' => $book->slug,
                'author' => $book->author,
                'description' => $book->description,
                'rating' => $book->rating,
                'preview_image_url' => $book->preview_image_url,
                'main_image_url' => $book->main_image_url,
                'created_at' => $book->created_at->format('Y-m-d'),
                'updated_at' => $book->updated_at->format('Y-m-d'),
            ];
        })->toArray();

        $res->assertJson($json);
    }


    /**
     * @test
     */
    public function response_for_route_books_show_is_view_book_show_with_single_book()
    {
        $this->withoutExceptionHandling();
        $book = Book::factory()->create();

        $res = $this->get('/api/books/' . $book->id);

        $res->assertJson([
            'id' => $book->id,
            'title' => $book->title,
            'slug' => $book->slug,
            'author' => $book->author,
            'description' => $book->description,
            'rating' => $book->rating,
            'preview_image_url' => $book->preview_image_url,
            'main_image_url' => $book->main_image_url,
            'created_at' => $book->created_at->format('Y-m-d'),
            'updated_at' => $book->updated_at->format('Y-m-d'),
        ]);
    }


    /**
     * @test
     */
    public function a_book_can_be_deleted()
    {
        $book = Book::factory()->create();

        $res = $this->delete('/api/books/' . $book->id);

        $this->assertSoftDeleted($book);

        $res->assertJson([
            'message' => 'deleted'
        ]);
    }
}

