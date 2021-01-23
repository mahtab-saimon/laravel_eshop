<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_details extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_Id',
        'orderDate',
        'orderStatus',
        'totalProducts',
        'subTotal',
        'vat',
        'total',
        'paymentStatus',
        'pay',
        'due',
    ];
}
