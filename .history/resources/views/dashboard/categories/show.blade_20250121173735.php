@extends('layouts.dashboard')

@section('title', $Category->name)

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Categories</li>
    <li class="breadcrumb-item active">{{ $category->name}}</li>
@endsection

@section('content')
  
<table class="table">
    <thead>
        <tr>
            <th></th>
            <th>Name</th>
            <th>Store</th>
            <th>Status</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        @forelse($category->products as $product)
        <tr>
            <td><img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" height="60"></td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->store->name }}</td>
            <td>{{ $product->status }}</td>
            <td>{{ $product->created_at }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="5">No products defined.</td>
        </tr>
        @endforelse
       
    </tbody>
</table>
@endsection
