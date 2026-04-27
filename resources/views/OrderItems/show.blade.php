<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Details</title>

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
        .details-box {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 3px 8px rgba(0,0,0,0.1);
        }
        p {
            font-size: 16px;
            margin: 8px 0;
        }
        strong {
            color: #333;
        }
        .actions {
            margin-top: 20px;
            text-align: center;
        }
        .actions a, .actions button {
            margin: 5px;
            padding: 10px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 15px;
            cursor: pointer;
        }
        .edit-btn {
            background: #007bff;
            color: white;
        }
        .edit-btn:hover {
            background: #0056b3;
        }
        .delete-btn {
            background: #dc3545;
            color: white;
            border: none;
        }
        .delete-btn:hover {
            background: #b52a37;
        }
        .back-btn {
            display: block;
            width: 100%;
            margin-top: 20px;
            padding: 12px;
            background: #6c757d;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
        }
        .back-btn:hover {
            background: #545b62;
        }
    </style>
</head>

<body>

<h1>Item Details</h1>

<div class="details-box">

    <p><strong>ID:</strong> {{ $orderItem->id }}</p>
    <p><strong>Name:</strong> {{ $orderItem->item_name }}</p>
    <p><strong>Description:</strong> {{ $orderItem->item_description }}</p>

    <div class="actions">
        <a class="edit-btn" href="{{ route('orderItems.edit', $orderItem->id) }}">Edit</a>

        <form method="post" action="{{ route('orderItems.destroy', $orderItem->id) }}" style="display:inline;">
            @csrf
            @method('DELETE')
            <button class="delete-btn" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
    </div>

    <form action="{{ route('orderItems.index') }}">
        <button class="back-btn" type="submit">Back to Items</button>
    </form>

</div>

</body>
</html>
