<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status'
    ];

    // const STATUS = ['active', 'inactive'];
    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';
    
    public function products(){
        return $this->hasMany(product::class);
    }
}
