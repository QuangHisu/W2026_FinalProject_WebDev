<?php

namespace App\Models;

use App\Enum\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    protected $fillable = ['customer_id', 'orderItem_id','provider_key', 'currency', 'status'];
    protected $casts = ['status' => Status::class];

    protected static function booted(): void
    {
        static::updated(function ($order) {

            // Only sync if status changed
            if ($order->isDirty('status')) {

                // Only sync if shipment exists AND status differs
                if ($order->shipment &&
                    $order->shipment->status->value !== $order->status->value) {

                    $order->shipment->update([
                        'status' => $order->status->value,
                    ]);
                }
            }
        });
    }

    public function shipment(): HasOne
    {
        return $this->hasOne(Shipment::class);
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function orderItem(): BelongsTo
    {
        return $this->belongsTo(OrderItem::class, 'orderItem_id');
    }
}
