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
<h1>Customer List</h1>
<a href="{{route('orderItems.index')}}">Item index</a><br>
<a href="{{route('orders.index')}}">Order index</a><br>
<a href="{{route('shipments.index')}}">Shipment index</a><br><br>
<a href="{{route('customers.create')}}">Add a New Customer</a>
<br><br>

<!-- create a table to show the list of customer -->
<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Address</th>
        <th>City</th>
        <th>Actions</th>
    </tr>
    @foreach($customers as $customer)
         <tr>
             <td>{{$customer->id}}</td>
             <td>{{$customer->name}}</td>
             <td>{{$customer->address}}</td>
             <td>{{$customer->city}}</td>
             <!-- Actions -->
             <td>
                 <a href="{{route('customers.edit',$customer->id)}}">Edit</a>
                 <a href="{{route('customers.show',$customer->id)}}">Details</a>
                 <form method="post" action="{{route('customers.destroy',$customer->id)}}" style="display: inline">
                     @csrf
                     @method('DELETE')
                     <button type="submit" onclick="return confirm('Are you sure?')">
                         Delete
                     </button>
                 </form>

             </td>
         </tr>
    @endforeach
</table>



</body>
</html>
