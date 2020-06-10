<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['uuid', 'title', 'flag', 'image', 'price', 'description'];
}
