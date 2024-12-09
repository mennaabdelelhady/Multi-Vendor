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
        <label for="parent_id">Category Parent</label>
        <select type="parent_id" name="name" class="form-control form-select">
            <option value="">Primary Category</option>
            @foreach ($parents as $parent )
            <option value="{{$parent->id}">{{$parent->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="">Description</label>
        <textarea name="description" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="">Image</label>
        <input type="file" name="image" class="form-control">
    </div>
    < class="form-group">
        <label for="">status</label>
        <div>
            <div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
  <label class="form-check-label" for="defaultCheck1">
    Default checkbox
  </label>
  </div><div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" disabled>
  <label class="form-check-label" for="defaultCheck2">
    Disabled checkbox
  </label>
  </div>

        </div>
    </div>
     <div class="form-group">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>

</form>

@endsection