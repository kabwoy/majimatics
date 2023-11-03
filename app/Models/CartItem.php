<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class CartItem extends Model
{
    use HasFactory , SoftDeletes;


    protected $fillable = [
        'productId',
        'quantity',
        'cartId'
    ];
    public function orderItems() : HasMany{
        return $this->hasMany(OrderItem::class);
    }
    public function product() : BelongsTo{
        return $this->belongsTo(Product::class , 'productId');
    }
}
