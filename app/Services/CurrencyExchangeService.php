<?php
namespace App\Services;

use App\Models\ApiLog;
use Illuminate\Support\Facades\Http;

class CurrencyExchangeService
{
    public function convert(float $amount, string $currency): float
    {
        $endpoint = "https://open.er-api.com/v6/latest/CAD";

        $response = Http::get($endpoint);

        // Log API call
        ApiLog::create([
            'provider' => 'currency',
            'endpoint' => $endpoint,
            'request_payload' => ['base' => 'CAD'],
            'response_payload' => $response->json(),
            'status_code' => $response->status(),
        ]);

        if (!$response->successful()) {
            return $amount; // fallback
        }

        $rates = $response->json('rates');

        if (!isset($rates[$currency])) {
            return $amount;
        }

        return round($amount * $rates[$currency], 2);
    }
}

