@extends('layouts.dashboard')

@section('title','Categories')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Categories</li>
@endsection

@section('content')

<table class="table"></table>
    <thead>
        <tr>
            <th>Image</th>
            <th>ID</th>
            <th>Name</th>
            <th>Parent</th>
            <th>Created At</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $Category)
        <tr>
            <td></td>
            <td>{{ $Category->id }}</td>
            <td>{{ $Category->name }}</td>
            <td>{{ $Category->parent_id }}</td>
            <td>{{ $Category->created_at }}</td>
            <td>
                <a href="{{ route('categories.edit') }}" class="btn btn-sm btn-outline-success">Edit</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection