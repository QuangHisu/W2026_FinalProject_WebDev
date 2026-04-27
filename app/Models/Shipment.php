<?php

namespace App\Models;

use App\Enum\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Shipment extends Model
{
    //
    protected $fillable = ['order_id','price','status','service'];
    protected $casts = [
        'status' => Status::class,
        'price' => 'decimal:2',
        ];

    public static function createForOrder($orderId,$price)
    {
        return self::query()->create([
            'order_id' => $orderId,
            'price'  => $price,
            'status' => Status::CREATED,
        ]);
    }

    // When you want to know if the model has been edited since it was queried from the
    // database, or isn't saved at all, then you use the ->isDirty() function. -stackOverflow-
    protected static function booted(): void // I use Internet in this part in order to sync
    {                                        // the enum status in both shipment and order
        static::updated(function ($shipment) {
            if ($shipment->isDirty('status')) {
                if ($shipment->order && $shipment->order->status->value !== $shipment->status->value) {
                    $shipment->order->update([
                        'status' => $shipment->status->value,
                    ]);
                }
            }
        });
    }

    public function order():BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function serviceLabel(): string
    {
        return match ($this->service) {
            'internal'    => 'Internal Courier',
            'canadapost'  => 'Canada Post',
            'ups'         => 'UPS',
            default       => ucfirst($this->service),
        };
    }

}
