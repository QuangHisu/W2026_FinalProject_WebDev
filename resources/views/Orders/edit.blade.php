<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Order Statuses</title>

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
        select {
            padding: 6px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }
        .btn-save {
            display: block;
            width: 200px;
            margin: 25px auto;
            padding: 12px;
            background: #28a745;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
        }
        .btn-save:hover {
            background: #1e7e34;
        }
        .back-btn {
            display: block;
            width: 200px;
            margin: 10px auto;
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
    </style>
</head>

<body>

<h1>Edit Statuses of Orders</h1>

<form action="{{ route('orders.update') }}" method="post">
    @csrf
    @method('PUT')

    <table>
        <tr>
            <th>ID</th>
            <th>Customer</th>
            <th>Item</th>
            <th>Status</th>
        </tr>

        @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->customer->name }}</td>
                <td>{{ $order->orderItem->item_name }}</td>
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

    <button class="btn-save" type="submit">Save Changes</button>
</form>

<form action="{{ route('orders.index') }}">
    <button class="back-btn" type="submit">Back to Orders</button>
</form>

</body>
</html>
