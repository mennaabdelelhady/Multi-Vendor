@extends('layouts.dashboard')

@section('title', 'Categories')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Categories</li>
@endsection

@section('content')

    <form action="{{ route('dashboard.categories.store') }}" method="POST">
        @csrf
        

    </form>

@endsection
