@extends('adminlte::page')
@section('title', 'Categories')
@section('content_header')
    <h1>Categories</h1>
@stop
@section('content')
    <p>Welcome to this beautiful admin panel.</p>
    <a class="btn btn-app" href="{{route('admin.categories.create')}}">
        <i class="fas fa-edit"></i> Add category
    </a>
    <a class="btn btn-app">
        <i class="fas fa-edit"></i> Edit
    </a>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th>Title of category</th>
                <th style="width: 40px">Label</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->title}}</td>
                    <td><span class="badge bg-danger">55%</span></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
    <script> console.log('Hi!'); </script>
@stop
