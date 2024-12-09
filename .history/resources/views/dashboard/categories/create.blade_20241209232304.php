@extends('layouts.dashboard')

@section('title','Categories')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Categories</li>
@endsection

@section('content')  

<form action="{{route('categories.store')}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="">Category Name</label>
        <input type="text" name="name"></div>

</form>

@endsection