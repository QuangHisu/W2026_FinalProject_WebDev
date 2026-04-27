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
<h1>Item Details</h1>

<p><strong>ID: </strong>{{$orderItem->id}}</p>
<p><strong>Name: </strong>{{$orderItem->item_name}}</p>
<p><strong>Address: </strong>{{$orderItem->item_description}}</p>

<a href="{{route('orderItems.edit',$orderItem->id)}}">Edit</a>
<a href="{{route('orderItems.show',$orderItem->id)}}">Details</a>
<form method="post" action="{{route('orderItems.destroy',$orderItem->id)}}" style="display: inline">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('Are you sure?')">
        Delete
    </button>
</form>

<form action="{{route('orderItems.index')}}">
    <button type="submit">Back to Index</button>
</form>

</body>
</html>
