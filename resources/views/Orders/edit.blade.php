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
<h1>Edit Statuses of Orders</h1>
<form action="{{route('orders.update')}}" method="post">
<table border="1" cellpadding="10">
    @csrf
    @method('PUT')
    <tr>
        <th>ID</th>
        <th>Customer</th>
        <th>Item</th>
        <th>Status</th>
    </tr>
    @foreach($orders as $order)
        <tr>
            <td>{{$order->id}}</td>
            <td>{{$order->customer->name}}</td>
            <td>{{$order->orderItem->item_name}}</td>
            <td>
                <select name="statuses[{{ $order->id }}]">
                    @foreach ($statuses as $status)
                        <option value="{{ $status->value }}"
                            {{ $order->status->value === $status->value ? 'selected' : '' }}>
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
<form action="{{route('orders.index')}}">
    <button type="submit">Back to Index</button>
</form>
</body>
</html>
