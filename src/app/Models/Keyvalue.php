<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Keyvalue extends Model
{
    use HasFactory;

    protected $fillable = [
        'size',
        'color',
        'brand',
        'composition',
        'quantity',
        'seo_title',
        'seo_h1',
        'seo_description',
        'product_weight',
        'product_width',
        'product_height',
        'product_length',
        'package_weight',
        'package_width',
        'package_height',
        'package_length',
        'product_category',
        'product_id'
    ];

    public function product():BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
