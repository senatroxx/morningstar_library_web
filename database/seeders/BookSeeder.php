<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books = json_decode(file_get_contents(public_path('books.json')), true)['books'];

        foreach ($books as $book) {
            $publisher = Publisher::firstOrCreate([
                'name' => $book['publisher']['name'],
            ]);

            $categoryId = [];

            foreach ($book['categoriesSlug'] as $category) {
                $createdCategory = Category::firstOrCreate([
                    'name' => ucwords(str_replace('-', ' ', $category)),
                ]);

                array_push($categoryId, $createdCategory->id);
            }

            $authorId = [];

            foreach ($book['authors'] as $author) {
                $createdAuthor = Author::firstOrCreate([
                    'name' => $author['title'],
                ]);

                array_push($authorId, $createdAuthor->id);
            }

            $createdBook = Book::create([
                'title' => $book['name'],
                'description' => $book['description'],
                'thumbnail' => $book['thumbnail'],
                'quantity' => \Faker\Factory::create()->numberBetween(1, 10),
                'published_at' => Carbon::parse($book['publishDate'])->format('Y-m-d'),
                'publisher_id' => $publisher->id,
            ]);

            $createdBook->categories()->attach($categoryId);
            $createdBook->authors()->attach($authorId);

        }
    }
}
