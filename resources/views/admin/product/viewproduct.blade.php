@extends('admin.index')
@section('viewproduct')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if(session('success1'))
    <div class="alert alert-danger">
        {{ session('success1') }}
    </div>
@endif
{{-- <div class="search">
     <form class="form-inline ">
              <button class="btn nav_search-btn" type="submit">
                <i class="fa fa-search" aria-hidden="true"></i>
              </button>
            </form>
</div> --}}

<div>
      <li><a href="{{ route('addproduct') }}">Add Product</a></li>
    <form id="searchForm" action="{{ route('search') }}" method="post">
        @csrf
        <div class="form-group">
            <input type="text" name="search" placeholder="Search for products...">
        </div>

<button type="submit" class="submit">Submit</button>
    </form>
</div>
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>S.No</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Image</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
           </thead>
        <tbody>
            @php $i = 1; @endphp
        @foreach($product as $pro)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $pro->name }}</td>
            {{-- Limit description to 100 characters for better display --}}
            <td>{{ Str::limit($pro->description, 50) }}</td>
            <td>{{ number_format($pro->price, 2) }}</td>
            <td><img src="{{ asset('storage/' . $pro->image) }}" alt="{{ $pro->name }}" width="100"></td>
            <td>{{ ucfirst($pro->status) }}</td>
            <td>
                <a href="{{ route('editproduct', $pro->id) }}" class="btn btn-sm btn-primary">Edit</a>
                <form action="{{ route('deleteproduct', $pro->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                </form>
            </td>
        </tr>
        </tbody>
        @endforeach

 {{ $product->links() }}
</table>
@endsection
