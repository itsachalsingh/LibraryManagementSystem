<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'image',
        'auther_name',
        'published_date'
    ];

    public function category($categoryId)
    {
        $category = Category::find($categoryId);
        if ($category) {
            return $category->name;
        }
        return null;
    }
}
