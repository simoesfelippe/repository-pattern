<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['uuid', 'title', 'category_id', 'image', 'price', 'description'];

    public function categories()
    {
       return $this->belongsTo(Category::class, 'category_id');
    }
}
