<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'code',
        'symbol',
        'rate'
    ];

    public function products(){
        return $this->hasOne(product::class);
    }
}
