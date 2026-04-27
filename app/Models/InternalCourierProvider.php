<?php

namespace App\Models;

use App\Enum\Status;

class InternalCourierProvider extends DeliveryProvider
{
    public function quote(Order $order): int
    {
        $postal = strtoupper($order->customer->postal_code);
        $first = $postal[0];

        if (!ctype_alpha($first)) {
            return 10;
        }

        $index = ord($first) - ord('A');
        $basePrice = 10 + $index;

        return max(1, $basePrice - 4);
    }

    public function createShipment(Order $order): Shipment
    {
        $price = $this->quote($order);

        $currency = $order->currency ?? 'CAD';

        $finalPrice = app(\App\Services\CurrencyExchangeService::class)
            ->convert($price, $currency);

        return Shipment::query()->create([
            'order_id' => $order->id,
            'price'    => $finalPrice,
            'status'   => Status::CREATED,
            'service'  => 'internal',
        ]);
    }

    public function providerName():string{
        return 'Internal Courier';
    }

    public function formatLabel(Shipment $shipment):string{
        return <<<LABEL
==============================
    INTERNAL COURIER LABEL
==============================
Service: Internal Courier
Order ID: {$shipment->order_id}
Shipment ID: {$shipment->id}
Price: \${$shipment->price}
Status: {$shipment->status->label()}
Created At: {$shipment->created_at}

Thank you for shipping with Internal Courier!
==============================
LABEL;
    }
}
