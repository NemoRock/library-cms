<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $categoriesDefault = [
            [
                'title' => 'Политика',
                'slug' => 'politics',
            ],
            [
                'title' => 'Кулинария',
                'slug' => 'cooking',
            ],
            [
                'title' => "Животные и природа",
                'slug' => 'animals-nature',
            ],
            [
                'title' => 'Научная фантастика',
                'slug' => 'science-fiction',
            ],
            [
                'title' => 'Историческое',
                'slug' => 'historical',
            ],
            [
                'title' => 'Фэнтези',
                'slug' => 'fantasy',
            ],
            [
                'title' => 'Романы',
                'slug' => 'novels',
            ],
            [
                'title' => 'Детективы',
                'slug' => 'detectives',
            ],
        ];
        foreach ($categoriesDefault as $category) {
            Category::create($category);
        }

        Book::factory()->count(1000)->create();

        $categories = Category::all();

        Book::all()->each(function ($book) use ($categories) {
            do {
                $category = $categories->random(1, $categories->count());

                if (in_array($category, $rand ?? [])) continue;
                $rand[] = $category;

                $book->categories()->attach(
                    end($rand)
                        ->pluck('id')->toArray()
                );
            } while (rand(0, 1));
        });

        User::factory()->create([
            'name' => 'admin',
            'password' => 'admin',
            'email' => 'admin@admin.com',
        ]);
    }
}
