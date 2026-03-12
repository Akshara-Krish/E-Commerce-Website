@extends('admin.index')
@section('vieworder')
<h1>Orders</h1>
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>S.No</th>
            <th>User Name</th>
            <th>Product Name</th>
            <th>product image</th>
            <th>Receiver Name</th>
            <th>Receiver Address</th>
            <th>Receiver Phone</th>
            <th>status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @php $i = 1; @endphp
        @foreach($orders as $order)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $order->user->name }}</td>
            <td>{{ $order->product->name }}</td>
            <td><img src="{{ asset('storage/' . $order->product->image) }}" alt="{{ $order->product->name }}" width="100"></td>
            <td>{{ $order->receiver_name }}</td>
            <td>{{ $order->receiver_address }}</td>
            <td>{{ $order->receiver_phone }}</td>
            <td>
                <form action="{{ route('updateorderstatus', $order->id) }}" method="POST">
                    @csrf
                    <select name="status" onchange="this.form.submit()">
                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                         <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                    </select>
                    <input type='submit' value='Update Status'>
                </form>
            </td>
            <td>
                <a href="{{ route('download_pdf', $order->id) }}" class="btn btn-sm btn-primary">Download PDF</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
