<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
</head>
<body>

<center>

<h2>Order Invoice</h2>

Customer Name : {{ $data->receiver_name }} <br><br>

Customer Address : {{ $data->receiver_address }} <br><br>

Customer Phone : {{ $data->receiver_phone }} <br><br>

Product Name : {{ $data->product->name }} <br><br>

Price : ${{ $data->product->price }} <br><br>

</center>

</body>
</html>
