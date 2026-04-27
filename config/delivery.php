<?php
return [
    'providers' => [
        'internal'    => App\Models\InternalCourierProvider::class,
        'canadapost'  => App\Models\CanadaPostProvider::class,
        'ups'         => App\Models\UpsProvider::class,
    ],
    'warehouse_address' => '374 rue Lahaie, Laval H7G3B7',
];
