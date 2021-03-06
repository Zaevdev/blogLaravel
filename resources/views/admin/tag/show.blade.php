@extends('adminlte::page')
@section('title', 'Tags')
@section('content_header')
    <h1>Tag</h1>
@stop
@section('content')
    <div class="card-body">
        <div class="card">
            <div class="card-body">
                <h5><span class="badge bg-secondary">#{{$tag->id}}</span>&nbsp;{{$tag->title}} </h5>
                <a href="{{route('admin.tag.edit', $tag->id)}}" class="btn btn-primary">Edit</a>
                <form action="{{route('admin.tag.delete', $tag->id)}}" class="btn btn-danger" method="POST">
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
