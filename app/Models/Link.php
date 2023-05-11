<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'icon',
        'route',
        'parent_id',
        'show_in_menu'
    ];

    public function users(){
        return $this->belongsToMany(User::class,'users_links');
    }
}
