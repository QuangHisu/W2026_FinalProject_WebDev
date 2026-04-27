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
<h1>Edit Customer</h1>
<form method="post" action="{{route('customers.update',$customer->id)}}">
    @csrf
    @method('PUT')

    <label>Name: </label>
    <input type="text" name="name" value="{{old('name',$customer->name)}}">
    @error('name')
        <div class="text-danger">{{ $message }}</div>
    @enderror
    <br><br>

    <label>Address: </label>
    <input type="text" name="address" value="{{old('address',$customer->address)}}">
    @error('address')
    <div class="text-danger">{{ $message }}</div>
    @enderror
    <br><br>

    <label>City: </label>
    <input type="text" name="city" value="{{old('city',$customer->city)}}">
    @error('city')
    <div class="text-danger">{{ $message }}</div>
    @enderror
    <br><br>

    <label>Postal Code: </label>
    <input type="text" name="postal_code" value="{{old('postal_code',$customer->postal_code)}}">
    @error('postal_code')
    <div class="text-danger">{{ $message }}</div>
    @enderror
    <br><br>

    <label>Phone Number: </label>
    <input type="number" name="phone" value="{{old('phone',$customer->phone)}}">
    @error('phone')
    <div class="text-danger">{{ $message }}</div>
    @enderror
    <br><br>

    <label>Email: </label>
    <input type="email" name="email" value="{{old('email',$customer->email)}}">
    @error('email')
    <div class="text-danger">{{ $message }}</div>
    @enderror
    <br><br>

    <button type="submit">Save</button>
</form>

<form action="{{route('customers.index')}}">
    <button type="submit">Back to Index</button>
</form>
</body>
</html>
