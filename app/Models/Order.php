<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'order_status',
        'total_price',
        'total_items',
        'name',
        'email',
        'phone',
        'city',
        'address'
    ];
    const STATUS_NEW = 'New';
    const STATUS_IN_PROGRESS = 'In progress';
    const STATUS_SENDED = 'Sended';
    const STATUS_DELIVERED = 'Delivered';
    const STATUS_CANCELED = 'Canceled';

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function orderItems(){
        return $this->hasMany(OrderDetails::class,'order_id','id');
    }
}
