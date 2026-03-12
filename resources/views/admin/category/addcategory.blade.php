@extends('admin.index')
@section('category')
<div class="container-fluid">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
<form action="{{ route('category_add') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="category">Category Name:</label>
    <input type="text" id="category" name="category" class="form-control">
    </div>
    
    <button type="submit" class="btn btn-primary">Add Category</button>
</form>
</div>
@endsection