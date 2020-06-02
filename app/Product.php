<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = [
        'category_id', 'name', 'slug', 'image', 'price', 'description'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function truncate(string $string)
    {
        return Str::limit($string, 120, ' ...');
    }
}
