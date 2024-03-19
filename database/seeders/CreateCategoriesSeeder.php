<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
               'name'=>'Friction',
            ],
            [
               'name'=>'Science',
            ],
            [
               'name'=>'Math',
            ],
        ];

        foreach ($categories as $key => $category) {
            Category::create($category);
        }
    }
}
