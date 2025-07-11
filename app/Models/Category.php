<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    public function books()
    {
        return $this->belongsToMany(Books::class, 'book_category', 'category_id', 'book_id');
    }
}
