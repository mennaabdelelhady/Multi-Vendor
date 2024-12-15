@extends('layouts.dashboard')

@section('title', 'Edit Category')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Categories</li>
    <li class="breadcrumb-item active">Edit Categories</li>
@endsection

@section('content')

    <form action="{{ route('dashboard.categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('dashboard.categories._form', [
            'button_label' => 'Update'
        ])

    </form>

@endsection
