<?php

namespace tests\Feature\Api;

use App\Models\Category;
use Illuminate\Console\Scheduling\CacheAware;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function a_category_can_be_stored()
    {
        $this->withoutExceptionHandling();

        $data = [
            'title' => 'Some',
            'slug' => 'fantastic',
        ];

        $res = $this->post('/api/categories', $data);

        $this->assertDatabaseCount('categories', 1);

        $category = Category::first();

        $this->assertEquals($data['title'], $category->title);
        $this->assertEquals($data['slug'], $category->slug);

        $res->assertJson([
            'id' => $category->id,
            'title' => $category->title,
            'slug' => $category->slug,
            'created_at' => $category->created_at->format('Y-m-d'),
            'updated_at' => $category->updated_at->format('Y-m-d'),
        ]);
    }

    /**
     * @test
     */
    public function a_category_can_be_updated()
    {
        $this->withoutExceptionHandling();

        $category = Category::factory()->create();

        $data = [
            'title' => 'Some edited',
            'slug' => 'fantastic edited',
        ];

        $res = $this->patch('/api/categories/' . $category->id, $data);

        $res->assertJson([
            'id' => $category->id,
            'title' => $data['title'],
            'slug' => $data['slug'],
            'created_at' => $category->created_at->format('Y-m-d'),
            'updated_at' => $category->updated_at->format('Y-m-d'),
        ]);
    }


    /**
     * @test
     */
    public function response_for_route_categories_index_is_view_category_index_with_categories()
    {
        $this->withoutExceptionHandling();

        $categories = Category::factory(10)->create();

        $res = $this->get('/api/categories');

        $res->assertOk();

        $json = $categories->map(function ($category){
            return[
                'id' => $category->id,
                'title' => $category->title,
                'slug' => $category->slug,
                'created_at' => $category->created_at->format('Y-m-d'),
                'updated_at' => $category->updated_at->format('Y-m-d'),
            ];
        })->toArray();

        $res->assertJson($json);
    }

    /**
     * @test
     */
    public function response_for_route_categories_show_is_view_categories_show_with_single_category()
    {
        $this->withoutExceptionHandling();

        $category = Category::factory()->create();

        $res = $this->get('/api/categories/' . $category->id);

        $res->assertJson([
            'id' => $category->id,
            'title' => $category->title,
            'slug' => $category->slug,
            'created_at' => $category->created_at->format('Y-m-d'),
            'updated_at' => $category->updated_at->format('Y-m-d'),
        ]);
    }

    /**
     * @test
     */
    public function a_category_can_be_deleted()
    {
        $this->withoutExceptionHandling();

        $category = Category::factory()->create();

        $res = $this->delete('/api/categories/'.$category->id);

        $this->assertDatabaseCount('categories', 0);

        $res->assertJson([
           'message' => 'deleted'
        ]);
    }
}
