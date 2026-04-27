<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Item</title>

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
        .form-container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 3px 8px rgba(0,0,0,0.1);
        }
        label {
            font-weight: bold;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }
        .btn {
            width: 100%;
            padding: 12px;
            background: #007bff;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
        }
        .btn:hover {
            background: #0056b3;
        }
        .back-btn {
            margin-top: 15px;
            width: 100%;
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

<h1>Add a New Item</h1>

<div class="form-container">
    <form method="post" action="{{ route('orderItems.store') }}">
        @csrf

        <label>Name:</label>
        <input type="text" name="item_name" value="{{ old('item_name') }}">

        <label>Description:</label>
        <input type="text" name="item_description" value="{{ old('item_description') }}">

        <button class="btn" type="submit">Save Item</button>
    </form>

    <form action="{{ route('orderItems.index') }}">
        <button class="back-btn" type="submit">Back to Items</button>
    </form>
</div>

</body>
</html>
