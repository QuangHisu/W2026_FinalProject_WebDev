<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Items</title>

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
        .add-btn {
            display: block;
            width: 220px;
            margin: 0 auto 25px auto;
            padding: 12px;
            background: #28a745;
            color: white;
            text-align: center;
            border-radius: 6px;
            text-decoration: none;
            font-size: 16px;
        }
        .add-btn:hover {
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
        .action-links a {
            margin-right: 10px;
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }
        .action-links a:hover {
            text-decoration: underline;
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

<h1>Order Items</h1>

<div class="top-links">
    <a href="{{ route('customers.index') }}">Customers</a>
    <a href="{{ route('orders.index') }}">Orders</a>
    <a href="{{ route('shipments.index') }}">Shipments</a>
</div>

<a class="add-btn" href="{{ route('orderItems.create') }}">+ Add New Item</a>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Actions</th>
    </tr>

    @foreach($orderItems as $orderItem)
        <tr>
            <td>{{ $orderItem->id }}</td>
            <td>{{ $orderItem->item_name }}</td>
            <td>{{ $orderItem->item_description }}</td>

            <td class="action-links">
                <a href="{{ route('orderItems.edit', $orderItem->id) }}">Edit</a>

                <form method="post" action="{{ route('orderItems.destroy', $orderItem->id) }}" style="display:inline;">
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
