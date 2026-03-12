@extends('admin.index')
@section('viewcategory')
 @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Category Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($category as $cat)
        <tr>
            <td>{{ $cat->id }}</td>
            <td>{{ $cat->category }}</td>
            <td>
                <a href="{{ route('editcategory',$cat->id) }}" class="btn btn-primary">Edit</a>
                <a href="{{ route('deletecategory',$cat->id) }}" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
@endsection