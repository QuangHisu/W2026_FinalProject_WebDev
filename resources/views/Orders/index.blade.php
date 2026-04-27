<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders List</title>

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
        .add-links {
            text-align: center;
            margin-bottom: 25px;
        }
        .add-links a {
            display: inline-block;
            margin: 0 10px;
            padding: 10px 16px;
            background: #28a745;
            color: white;
            border-radius: 6px;
            text-decoration: none;
            font-size: 15px;
        }
        .add-links a:hover {
            background: #1e7e34;
        }
        table {
            width: 90%;
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

<h1>Orders List</h1>

<div class="top-links">
    <a href="{{ route('orderItems.index') }}">Order Items</a>
    <a href="{{ route('customers.index') }}">Customers</a>
    <a href="{{ route('shipments.index') }}">Shipments</a>
</div>

<div class="add-links">
    <a href="{{ route('orders.create') }}">+ Add New Order</a>
    <a href="{{ route('orders.edit') }}">✎ Edit Statuses</a>
</div>

<table>
    <tr>
        <th>ID</th>
        <th>Customer</th>
        <th>Item</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>

    @foreach($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->customer->name }}</td>
            <td>{{ $order->orderItem->item_name }}</td>
            <td>{{ ucfirst(str_replace('_', ' ', $order->status->value)) }}</td>

            <td>
                <form method="post" action="{{ route('orders.destroy', $order->id) }}" style="display:inline;">
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

</body>
</html>
