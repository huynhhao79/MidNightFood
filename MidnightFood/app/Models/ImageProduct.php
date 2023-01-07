<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'image1',
        'image2',
        'image3',
        'image4',
        'image5',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
