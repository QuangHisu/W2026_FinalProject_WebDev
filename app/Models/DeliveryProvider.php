<?php

namespace App\Models;

abstract class DeliveryProvider
{
    abstract public function quote(Order $order):int;
    abstract public function createShipment(Order $order):Shipment;
    abstract public function providerName():string;
    abstract public function formatLabel(Shipment $shipment):string;
}
