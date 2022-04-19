@extends('adminlte::page')
@section('title', 'Categories')
@section('content_header')
    <h1>Categories</h1>
@stop
@section('content')
    <a class="btn btn-app" href="{{route('admin.categories.create')}}">
        <i class="fas fa-edit"></i> Add category
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
                    <td><a href="{{route('admin.categories.show', $category->id)}}" class="btn btn-default btn-sm">
                            <i class="fas fa-eye"></i>
                        </a></td>
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
