@extends('layouts.dashboard')

@section('title','Categories')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Categories</li>
@endsection

@section('content')  

<table class="table">
    <thead>
        <tr>
            <th>Image</th>
            <th>ID</th>
            <th>Name</th>
            <th>Parent</th>
            <th>Created At</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <tbody>
        @forelse($categories as $Category)
        <tr>
            <td></td>
            <td>{{ $Category->id }}</td>
            <td>{{ $Category->name }}</td>
            <td>{{ $Category->parent_id }}</td>
            <td>{{ $Category->created_at }}</td>
            <td>
                <a href="{{ route('categories.edit') }}" class="btn btn-sm btn-outline-success">Edit</a>
            </td>
            <td>
                <form action="{{ route('categories.destroy') }}" method="POST">
                    @csrf
                    <!-- Form Method Spoofing -->
                    <input type="hidden" name="_method" value="delete">
                    @method('delete')
                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="7">No categories defined.</td>
        </tr>
        @endforelse
       
    </tbody>
</table>

@endsection