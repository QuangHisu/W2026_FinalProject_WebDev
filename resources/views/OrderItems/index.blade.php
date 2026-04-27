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
<h1>Order Items</h1>
<a href="{{route('customers.index')}}">Customer index</a><br>
<a href="{{route('orders.index')}}">Order index</a><br>
<a href="{{route('shipments.index')}}">Shipment index</a><br><br>
<a href="{{route('orderItems.create')}}">Add a New Item</a>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Actions</th>
    </tr>
    @foreach($orderItems as $orderItem)
        <tr>
            <td>{{$orderItem->id}}</td>
            <td>{{$orderItem->item_name}}</td>
            <td>{{$orderItem->item_description}}</td>
            <td>
                <a href="{{route('orderItems.edit',$orderItem->id)}}">Edit</a>
                <form method="post" action="{{route('orderItems.destroy',$orderItem->id)}}" style="display: inline">
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
