<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillingDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'fname',
        'lname',
        'companyName',
        'address',
        'apartment',
        'country',
        'zip',
        'email',
        'phone',
        'note'
    ];
}
