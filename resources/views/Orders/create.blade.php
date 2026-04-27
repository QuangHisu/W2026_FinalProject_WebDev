<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Delivery System</title>
</head>
<body>
<h1>Add a New Order</h1>

{{-- PREVIEW FORM (GET) --}}
<form method="GET" action="{{ route('orders.create') }}">
    <label for="customer_id">Customer: </label>
    <select name="customer_id" id="customer_id">
        <option value="">-- Select Customer --</option>
        @foreach($customers as $customer)
            <option value="{{ $customer->id }}"
                {{ request('customer_id') == $customer->id ? 'selected' : '' }}>
                {{ $customer->name }}
            </option>
        @endforeach
    </select>
    <br><br>

    <label for="orderItem_id">Item: </label>
    <select name="orderItem_id" id="orderItem_id">
        <option value="">-- Select Item --</option>
        @foreach($orderItems as $orderItem)
            <option value="{{ $orderItem->id }}"
                {{ request('orderItem_id') == $orderItem->id ? 'selected' : '' }}>
                {{ $orderItem->item_name }}
            </option>
        @endforeach
    </select>
    <br><br>

    <label for="provider_key">Delivery Provider:</label>
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
    <br><br>

    <label>Currency:</label>
    <div>
        <input type="radio" name="currency" value="CAD" {{ request('currency','CAD')=='CAD'?'checked':'' }}> CAD
        <input type="radio" name="currency" value="USD" {{ request('currency')=='USD'?'checked':'' }}> USD
        <input type="radio" name="currency" value="EUR" {{ request('currency')=='EUR'?'checked':'' }}> EUR
        <input type="radio" name="currency" value="GBP" {{ request('currency')=='GBP'?'checked':'' }}> GBP
    </div>

    <br>

    <button type="submit">Preview Price</button>
</form>

{{-- PRICE PREVIEW --}}
@if(isset($previewPrice))
    <div style="margin-top: 20px; padding: 10px; border: 1px solid #ccc;">
        <strong>Price Preview:</strong> {{ $previewPrice }} {{ request('currency') }}
    </div>
@endif

<br><hr><br>

{{-- FINAL SUBMIT FORM (POST) --}}
<form method="POST" action="{{ route('orders.store') }}">
    @csrf

    <input type="hidden" name="customer_id" value="{{ request('customer_id') }}">
    <input type="hidden" name="orderItem_id" value="{{ request('orderItem_id') }}">
    <input type="hidden" name="provider_key" value="{{ request('provider_key') }}">
    <input type="hidden" name="currency" value="{{ request('currency','CAD') }}">

    <button type="submit"
        {{ !request('customer_id') || !request('provider_key') ? 'disabled' : '' }}>
        Save
    </button>
</form>

<form action="{{route('orders.index')}}">
    <button type="submit">Back to Index</button>
</form>

</body>
</html>
