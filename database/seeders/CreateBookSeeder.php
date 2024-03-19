<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Clear existing data
        Book::truncate();

        // Get all categories
        $categories = Category::all();

        // Generate dummy posts
        $faker = \Faker\Factory::create();
        foreach (range(1, 10) as $index) {
            $title = $faker->sentence;
           
            $imagePath = 'images/' . $faker->image(storage_path('app/public/images'), 400, 300, null, false);
            $author = $faker->name;
            $publishDate = $faker->dateTimeThisYear();

            // Get random category
            $category = $categories->random();

            // Save the book with image, category, author, and publish date
            $book = new Book();
            $book->name = $title;
          
            $book->image = $imagePath;
            $book->category_id = $category->id; // Assuming category_id is the foreign key
            $book->auther_name = $author; // Assuming 'author' is the column in the 'book' table
            $book->published_date = $publishDate; // Assuming 'published_at' is the column in the 'book' table
            $book->save();
        }
    }
}
