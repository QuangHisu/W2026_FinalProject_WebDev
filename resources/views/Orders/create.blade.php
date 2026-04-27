<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Order</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 40px;
        }
        h1 {
            text-align: center;
            margin-bottom: 25px;
        }
        .section-box {
            max-width: 700px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 3px 8px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }
        label {
            font-weight: bold;
        }
        select, input[type="radio"] {
            margin-top: 5px;
        }
        select {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
            margin-bottom: 15px;
        }
        .btn {
            width: 100%;
            padding: 12px;
            background: #007bff;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
        }
        .btn:hover {
            background: #0056b3;
        }
        .save-btn {
            background: #28a745;
        }
        .save-btn:hover {
            background: #1e7e34;
        }
        .back-btn {
            margin-top: 15px;
            width: 100%;
            padding: 12px;
            background: #6c757d;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
        }
        .back-btn:hover {
            background: #545b62;
        }
        .preview-box {
            margin-top: 20px;
            padding: 15px;
            border-radius: 8px;
            background: #e9ecef;
            border-left: 5px solid #007bff;
        }
    </style>
</head>

<body>

<h1>Add a New Order</h1>

<div class="section-box">
    <form method="GET" action="{{ route('orders.create') }}">

        <label>Customer:</label>
        <select name="customer_id">
            <option value="">-- Select Customer --</option>
            @foreach($customers as $customer)
                <option value="{{ $customer->id }}"
                    {{ request('customer_id') == $customer->id ? 'selected' : '' }}>
                    {{ $customer->name }}
                </option>
            @endforeach
        </select>

        <label>Item:</label>
        <select name="orderItem_id">
            <option value="">-- Select Item --</option>
            @foreach($orderItems as $orderItem)
                <option value="{{ $orderItem->id }}"
                    {{ request('orderItem_id') == $orderItem->id ? 'selected' : '' }}>
                    {{ $orderItem->item_name }}
                </option>
            @endforeach
        </select>

        <label>Delivery Provider:</label>
        <select name="provider_key" required>
            <option value="">-- Select Provider --</option>
            @foreach($providers as $key => $class)
                @php $provider = new $class; @endphp
                <option value="{{ $key }}"
                    {{ request('provider_key') == $key ? 'selected' : '' }}>
                    {{ $provider->providerName() }}
                </option>
            @endforeach
        </select>

        <label>Currency:</label>
        <div style="margin-bottom: 15px;">
            <input type="radio" name="currency" value="CAD" {{ request('currency','CAD')=='CAD'?'checked':'' }}> CAD
            <input type="radio" name="currency" value="USD" {{ request('currency')=='USD'?'checked':'' }}> USD
            <input type="radio" name="currency" value="EUR" {{ request('currency')=='EUR'?'checked':'' }}> EUR
            <input type="radio" name="currency" value="GBP" {{ request('currency')=='GBP'?'checked':'' }}> GBP
        </div>

        <button class="btn" type="submit">Preview Price</button>
    </form>

    @if(isset($previewPrice))
        <div class="preview-box">
            <strong>Price Preview:</strong> {{ $previewPrice }} {{ request('currency') }}
        </div>
    @endif
</div>

<div class="section-box">
    <form method="POST" action="{{ route('orders.store') }}">
        @csrf

        <input type="hidden" name="customer_id" value="{{ request('customer_id') }}">
        <input type="hidden" name="orderItem_id" value="{{ request('orderItem_id') }}">
        <input type="hidden" name="provider_key" value="{{ request('provider_key') }}">
        <input type="hidden" name="currency" value="{{ request('currency','CAD') }}">

        <button class="btn save-btn" type="submit"
            {{ !request('customer_id') || !request('provider_key') ? 'disabled' : '' }}>
            Save Order
        </button>
    </form>

    <form action="{{ route('orders.index') }}">
        <button class="back-btn" type="submit">Back to Orders</button>
    </form>
</div>

</body>
</html>
