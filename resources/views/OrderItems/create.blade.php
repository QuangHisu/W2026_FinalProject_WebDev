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
<h1>Add a New Item</h1>
<form method="post" action="{{route('orderItems.store')}}">
    @csrf
    <label>Name: </label>
    <input type="text" name="item_name" value="{{old('item_name')}}">
    <br><br>

    <label>Description: </label>
    <input type="text" name="item_description" value="{{old('item_description')}}">
    <br><br>

    <button type="submit">Save</button>
</form>

<form action="{{route('orderItems.index')}}">
    <button type="submit">Back to Index</button>
</form>
</body>
</html>
