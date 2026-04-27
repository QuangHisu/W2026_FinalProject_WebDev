<?php

namespace App\Http\Controllers;

use App\Enum\Status;
use App\Models\Order;
use App\Models\Shipment;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $shipments = Shipment::all();
        return view('shipments.index', compact('shipments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('shipments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'price' => 'required|numeric|min:0',
            'service' => 'required|string',
        ]);

        Shipment::query()->create([
            'order_id' => $request->order_id,
            'price' => $request->price,
            'status' => Status::CREATED,
            'service' => $request->service,
        ]);

        return redirect()->route('shipments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Shipment $shipment)
    {
        //
        return view('orders.show', compact('shipment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
        $shipments = Shipment::all();
        $statuses = Status::cases();
        return view('shipments.edit', compact('shipments','statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        foreach ($request->statuses as $shipmentId => $statusValue) {

            $shipment = Shipment::all()->firstWhere('id', $shipmentId);

            if ($shipment) {
                $shipment->status = $statusValue;
                $shipment->save();
            }
        }

        return redirect()->route('shipments.index')->with('success', 'Shipments updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shipment $shipment)
    {
        $shipment->delete();
        return redirect()->route('shipments.index');
    }
}
