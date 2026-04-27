<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shipment List</title>

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
        .top-links {
            text-align: center;
            margin-bottom: 25px;
        }
        .top-links a {
            margin: 0 10px;
            color: #007bff;
            font-weight: bold;
            text-decoration: none;
        }
        .top-links a:hover {
            text-decoration: underline;
        }
        .edit-btn {
            display: block;
            width: 200px;
            margin: 0 auto 25px auto;
            padding: 12px;
            background: #ffc107;
            color: black;
            text-align: center;
            border-radius: 6px;
            text-decoration: none;
            font-size: 16px;
        }
        .edit-btn:hover {
            background: #e0a800;
        }
        table {
            width: 95%;
            margin: auto;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 3px 8px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }
        th {
            background: #007bff;
            color: white;
        }
        tr:hover {
            background: #f1f1f1;
        }
        .delete-btn {
            background: #dc3545;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 4px;
            cursor: pointer;
        }
        .delete-btn:hover {
            background: #b52a37;
        }
    </style>
</head>

<body>

<h1>Shipment List</h1>

<div class="top-links">
    <a href="{{ route('orderItems.index') }}">Order Items</a>
    <a href="{{ route('orders.index') }}">Orders</a>
    <a href="{{ route('customers.index') }}">Customers</a>
</div>

<a class="edit-btn" href="{{ route('shipments.edit') }}">✎ Edit Shipments</a>

<table>
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
            <td>{{ $shipment->id }}</td>
            <td>{{ $shipment->order_id }}</td>
            <td>{{ $shipment->price }}</td>
            <td>{{ $shipment->order->currency }}</td>
            <td>{{ ucfirst(str_replace('_', ' ', $shipment->status->value)) }}</td>
            <td>{{ $shipment->serviceLabel() }}</td>

            <td>
                <form action="{{ route('shipments.destroy', $shipment->id) }}" method="post" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="delete-btn" type="submit" onclick="return confirm('Are you sure?')">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
<form action="{{ route('home') }}">
    <button type="submit"
            style="
                margin-top:20px;
                padding:12px 20px;
                background:#343a40;
                color:white;
                border:none;
                border-radius:6px;
                cursor:pointer;
                font-size:16px;
            ">
        Back to Home
    </button>
</form>
</body>
</html>
