<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;
    protected $with=['image', 'keyvalue'];

    protected $fillable = [
        'external_code',
        'name',
        'description',
        'price',
        'discount',
    ];

    public function image(): HasOne
    {
        return $this->hasOne(Image::class);
    }

    public function keyvalue(): HasOne
    {
        return $this->hasOne(Keyvalue::class);
    }
}
