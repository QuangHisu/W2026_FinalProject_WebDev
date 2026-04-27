<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $orderItems = OrderItem::all();
        return view('OrderItems.index',compact('orderItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('OrderItems.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
           'item_name' => 'required',
           'item_description' => 'required',
        ]);

        OrderItem::query()->create($request->all());
        return redirect()->route('orderItems.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderItem $orderItem)
    {
        //
        return view('OrderItems.show',compact('orderItem'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderItem $orderItem)
    {
        //
        return view('OrderItems.edit',compact('orderItem'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OrderItem $orderItem)
    {
        //
        $request->validate([
            'item_name' => 'required',
            'item_description' => 'required',
        ]);
        $orderItem->update($request->all());
        return redirect()->route('orderItems.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderItem $orderItem)
    {
        //
        $orderItem->delete();
        return redirect()->route('orderItems.index');
    }
}
