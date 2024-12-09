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
        <input type="text" name="name" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Category Parent</label>
        <select type="parent_id" name="name" class="form-control">
            <option value="">Primary Category</option>
            @foreach ($parents as $parent )
            <option value="">{{$parent->name}}</option>
            @endforeach
        </select>
    </div>

</form>

@endsection