<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'ProductName',
        'color',
        'price',
        'qty',
        'brand',
        'discountPercentage',
        'category',
        'rate',
        'description',
        'productid',
        'thumbnail',
        'images',
  ];

}
