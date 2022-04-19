@extends('adminlte::page')
@section('title', 'Categories')
@section('content_header')
    <h1>Categories</h1>
@stop
@section('content')
    <p>Welcome to this beautiful admin panel.</p>
    <a class="btn btn-app" href="{{route('categories.create')}}">
        <i class="fas fa-edit"></i> Add category
    </a>
    <a class="btn btn-app">
        <i class="fas fa-edit"></i> Edit
    </a>
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
    <script> console.log('Hi!'); </script>
@stop
