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
            <th>ID</th>
            <th>Name</th>
            <th>Parent</th>
            <th>Created At</th>
        </tr>
    </thead>
</table>

@endsection