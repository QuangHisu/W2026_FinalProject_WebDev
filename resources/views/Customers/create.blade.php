<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Customer</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 40px;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
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
        .error {
            color: red;
            font-size: 14px;
            margin-top: -10px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

<h1>Add a New Customer</h1>

<div class="form-container">
    <form method="post" action="{{ route('customers.store') }}">
        @csrf

        <label>Name:</label>
        <input type="text" name="name" value="{{ old('name') }}">
        @error('name') <div class="error">{{ $message }}</div> @enderror

        <label>Address:</label>
        <input type="text" name="address" value="{{ old('address') }}">
        @error('address') <div class="error">{{ $message }}</div> @enderror

        <label>City:</label>
        <input type="text" name="city" value="{{ old('city') }}">
        @error('city') <div class="error">{{ $message }}</div> @enderror

        <label>Postal Code:</label>
        <input type="text" name="postal_code" value="{{ old('postal_code') }}">
        @error('postal_code') <div class="error">{{ $message }}</div> @enderror

        <label>Phone Number:</label>
        <input type="number" name="phone" value="{{ old('phone') }}">
        @error('phone') <div class="error">{{ $message }}</div> @enderror

        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email') }}">
        @error('email') <div class="error">{{ $message }}</div> @enderror

        <button class="btn" type="submit">Save Customer</button>
    </form>

    <form action="{{ route('customers.index') }}">
        <button class="back-btn" type="submit">Back to Customers</button>
    </form>
</div>

</body>
</html>
