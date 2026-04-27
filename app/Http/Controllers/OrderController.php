<?php

namespace App\Http\Controllers;

use App\Enum\Status;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipment;
use Illuminate\Http\Request;
use NunoMaduro\Collision\Provider;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $orders = Order::with('customer','orderItem','shipment')->get();

        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $customers = Customer::all();
        $orderItems = OrderItem::all();
        $providers = config('delivery.providers');

        $previewPrice = null;

        if ($request->has(['customer_id', 'provider_key', 'currency'])) {

            $customer = Customer::find($request->customer_id);

            if ($customer) {

                // Fake order for preview
                $order = new Order([
                    'customer_id' => $customer->id,
                    'provider_key' => $request->provider_key,
                ]);

                $order->setRelation('customer', $customer);

                // Resolve provider
                $providerClass = config("delivery.providers.{$request->provider_key}");
                $provider = new $providerClass;

                // Base price
                $basePrice = $provider->quote($order);

                // Convert currency
                $previewPrice = app(\App\Services\CurrencyExchangeService::class)
                    ->convert($basePrice, $request->currency);
            }
        }

        return view('orders.create', compact('customers', 'orderItems', 'providers', 'previewPrice'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'orderItem_id' => 'required|exists:order_items,id',
            'provider_key' => 'required|string',
        ]);

        // Create Order using mass assignment
        $order = Order::query()->create([
            'customer_id' => $request->customer_id,
            'orderItem_id' => $request->orderItem_id,
            'provider_key' => $request->provider_key,
            'status' => Status::CREATED,
        ]);

        // Create Shipment using mass assignment
        $providerClass = config("delivery.providers.{$request->provider_key}");
        $provider = new $providerClass;

        // Create shipment using provider logic
        $provider->createShipment($order);

        return redirect()->route('orders.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
        $orders = Order::with('customer','orderItem')->get();
        $statuses = Status::cases();
        return view('orders.edit', compact('orders','statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        foreach ($request->statuses as $orderId => $statusValue) {

            $order = Order::all()->firstWhere('id', $orderId);

            if ($order) {
                $order->status = $statusValue;
                $order->save();
            }
        }

        return redirect()->route('orders.index')->with('success', 'Order status has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
        $order->delete();
        return redirect()->route('orders.index');
    }
}
