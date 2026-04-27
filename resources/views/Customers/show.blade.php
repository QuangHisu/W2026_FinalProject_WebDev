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
<h1>Customer Details</h1>
<br><br>

<p><strong>ID: </strong>{{$customer->id}}</p>
<p><strong>Name: </strong>{{$customer->name}}</p>
<p><strong>Address: </strong>{{$customer->address}}</p>
<p><strong>City: </strong>{{$customer->city}}</p>
<p><strong>Postal Code: </strong>{{$customer->postal_code}}</p>
<p><strong>Phone Number: </strong>{{$customer->phone}}</p>
<p><strong>Email: </strong>{{$customer->email}}</p>

<!-- Action -->
<a href="{{route('customers.edit',$customer->id)}}">Edit</a>
<a href="{{route('customers.show',$customer->id)}}">Details</a>
<form method="post" action="{{route('customers.destroy',$customer->id)}}" style="display: inline">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('Are you sure?')">
        Delete
    </button>
</form>

<br><br>
<form action="{{route('customers.index')}}">
    <button type="submit">Back to Index</button>
</form>




</body>
</html>
