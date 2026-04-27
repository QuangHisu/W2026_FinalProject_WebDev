<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Shipment List</h1>
<a href="{{route('orderItems.index')}}">Item index</a><br>
<a href="{{route('orders.index')}}">Order index</a><br>
<a href="{{route('customers.index')}}">Customers index</a><br><br>
<a href="{{route('shipments.edit')}}">Edit</a>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Order ID</th>
        <th>Price</th>
        <th>Currency</th>
        <th>Status</th>
        <th>Service</th>
        <th>Actions</th>
    </tr>
    @foreach($shipments as $shipment)
        <tr>
            <td>{{$shipment->id}}</td>
            <td>{{$shipment->order_id}}</td>
            <td>{{$shipment->price}}</td>
            <td>{{$shipment->order->currency}}</td>
            <td>{{ucfirst(str_replace('_', ' ', $shipment->status->value))}}</td>
            <td>{{$shipment->serviceLabel()}}</td>
            <td>
                <form action="{{route('shipments.destroy',$shipment->id)}}" method="post" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
</table>



</body>
</html>
