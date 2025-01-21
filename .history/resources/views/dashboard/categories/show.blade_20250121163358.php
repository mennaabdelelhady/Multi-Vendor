@extends('layouts.dashboard')

@section('title', $Category->name)

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Categories</li>
    <li class="breadcrumb-item active">{{ $category->name}}</li>
@endsection

@section('content')
  
@endsection
