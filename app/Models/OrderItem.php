<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    //
    protected $fillable = ['item_name','item_description'];

    public function orders():BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
