<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'details',
        'main_image',
        'category_id',
        'store_id',
        'currency_id',
        'regular_price',
        'sale_price',
        'status',
        'quantity',
        'images'
    ];

    public function category(){
        return $this->belongsTo(category::class);
    }

    public function store(){
        return $this->belongsTo(store::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}
