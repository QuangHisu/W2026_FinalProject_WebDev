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
<h1>Orders List</h1>
<a href="{{route('orderItems.index')}}">Item index</a><br>
<a href="{{route('customers.index')}}">Customer index</a><br>
<a href="{{route('shipments.index')}}">Shipment index</a><br><br>
<a href="{{route('orders.create')}}">Add a New Order</a><br>
<a href="{{route('orders.edit')}}">Edit</a>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Customer</th>
        <th>Item</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
    @foreach($orders as $order)
        <tr>
            <td>{{$order->id}}</td>
            <td>{{$order->customer->name}}</td>
            <td>{{$order->orderItem->item_name}}</td>
            <td>{{ucfirst(str_replace('_', ' ', $order->status->value))}}</td>
            <td>
                <form method="post" action="{{route('orders.destroy',$order->id)}}" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure?')">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
</table>



</body>
</html>
