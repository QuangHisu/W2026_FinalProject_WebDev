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
<h1>Edit Shipments</h1>
<form action="{{route('shipments.update')}}" method="post">
    <table border="1" cellpadding="10">
        @csrf
        @method('PUT')
        <tr>
            <th>ID</th>
            <th>Order ID</th>
            <th>Price</th>
            <th>Currency</th>
            <th>Service</th>
            <th>Status</th>
        </tr>
        @foreach($shipments as $shipment)
            <tr>
                <td>{{$shipment->id}}</td>
                <td>{{$shipment->order_id}}</td>
                <td>{{$shipment->price}}</td>
                <td>{{$shipment->order->currency}}</td>
                <td>{{$shipment->serviceLabel()}}</td>
                <td>
                    <select name="statuses[{{ $shipment->id }}]">
                        @foreach ($statuses as $status)
                            <option value="{{ $status->value }}"
                                {{ $shipment->status->value === $status->value ? 'selected' : '' }}>
                                {{ ucfirst(str_replace('_', ' ', $status->value)) }}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>
        @endforeach
    </table>
    <button type="submit">Save</button>
</form>

<form action="{{route('shipments.index')}}">
    <button type="submit">Back to Index</button>
</form>

</body>
</html>
