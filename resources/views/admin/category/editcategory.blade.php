@extends('admin.index')
@section('edit_category')
<div class="container-fluid">
     @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('updatecategory',$category->id)}}" method="POST">
    
        @csrf
        <div class="form-group">
            <label for="category">Category Name</label>
            <input type="text" name="category" id="category" value="{{ $category->category }}" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Update Category</button>
    </form>
</div>
@endsection