<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Shipping extends Model
{
    use HasFactory;

    public function shipping():BelongsTo{

        return $this->belongsTo(User::class , 'userId');

    }
}
