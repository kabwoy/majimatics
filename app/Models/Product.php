<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'product_name',
        'price',
        'size',
        'categoryId',
        'quantity',
       'image',
       'description'
    ];

    public function category():BelongsTo{

        return $this->belongsTo(Category::class, 'categoryId');

    }

    public function cartItem() : HasMany{
        return $this->hasMany(CartItem::class , 'productId');
    }
}
