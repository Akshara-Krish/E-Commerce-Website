@extends('admin.index')
@section('editproduct')

<div class="container">

    <form action="{{ route('product_update', $product->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
            </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" required>{{ $product->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" step=".01" value="{{ $product->price }}" required>
        </div>
        <div class="form-group">
    <label>Current Image</label><br>

    @if($product->image)
        <img src="{{ asset('storage/' . $product->image) }}"
             width="150"
             class="mb-2">
    @endif
</div>

<div class="form-group">
    <label for="image">Change Image</label>
    <input type="file"
           class="form-control-file"
           id="image"
           name="image">
</div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status">
                <option value="active" {{ $product->status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ $product->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
</div>
@endsection
