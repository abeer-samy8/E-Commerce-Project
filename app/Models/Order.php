<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'order_status_id',
        'total_price',
        'total_items',
        'name',
        'email',
        'phone',
        'city',
        'address'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function orderStatus(){
        return $this->belongsTo(OrderStatus::class);
    }
    public function orderItems(){
        return $this->hasMany(OrderDetails::class,'order_id','id');
    }
}
