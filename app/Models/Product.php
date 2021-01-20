<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'catId',
        'brandId',
        'productCode',
        'productPlce',
        'productRoute',
        'productDescription',
        'productImage',
        'buyingPrice',
        'sellingPrice',
        'size',
        'color',
        'status',
    ];
}
