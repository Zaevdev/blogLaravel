@extends('adminlte::page')
@section('title', 'Category')
@section('content_header')
    <h1>Category</h1>
@stop
@section('content')
    <div class="card-body">
        <div class="card">
            <div class="card-body">
                <h5><span class="badge bg-secondary">#{{$category->id}}</span>&nbsp;{{$category->title}} </h5>
                <a href="{{route('admin.categories.edit', $category->id)}}" class="btn btn-primary">Edit</a>
                <form action="{{route('admin.categories.delete', $category->id)}}" class="btn btn-danger" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="border-0 bg-transparent text-white">Delete</button>
                </form>
            </div>
        </div>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
    <script> console.log('Hi!'); </script>
@stop
