<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery System - Home</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 40px;
        }
        h1 {
            text-align: center;
            margin-bottom: 40px;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
            max-width: 800px;
            margin: auto;
        }
        .card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 3px 8px rgba(0,0,0,0.1);
            text-align: center;
            transition: 0.2s;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 14px rgba(0,0,0,0.15);
        }
        .card a {
            text-decoration: none;
            color: #333;
            font-size: 20px;
            font-weight: bold;
        }
    </style>
</head>

<body>

<h1>Delivery System Dashboard</h1>

<div class="grid">

    <div class="card">
        <a href="{{ route('orders.index') }}">📦 Orders</a>
    </div>

    <div class="card">
        <a href="{{ route('shipments.index') }}">🚚 Shipments</a>
    </div>

    <div class="card">
        <a href="{{ route('customers.index') }}">👤 Customers</a>
    </div>

    <div class="card">
        <a href="{{ route('orderItems.index') }}">🛒 Order Items</a>
    </div>

</div>

</body>
</html>
