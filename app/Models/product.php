<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $table = "products";
    protected $timeStamp   = true;
    protected $fillable = [
        'name',
        'code',
        'category',
        'sub_category',
        'tags',
        'rate',
        'tax',
        'quantity',
        'quantity_alert',
        'product_unit',
        'unit_quantity',
        'status',
        'image',
        'description',
        'brand',
        'purchase_price',
        'unit_price',
        'unit_pieces',
        'package_quantity',
    ];


    protected $casts = [
        'rate' => 'float',
        'tax' => 'integer',
        'quantity' => 'integer',
        'quantity_alert' => 'integer',
        'unit_quantity' => 'integer',
        'purchase_price' => 'float',
        'unit_price' => 'float',
        'unit_pieces' => 'integer',
        'package_quantity' => 'integer',
    ];
}
