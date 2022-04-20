@extends('adminlte::page')
@section('title', 'Posts')
@section('content_header')
    <h1>Post</h1>
@stop
@section('content')
    <div class="card-body">
        <div class="card">
            <div class="card-body">
                <h5><span class="badge bg-secondary">#{{$post->id}}</span>&nbsp;{{$post->title}} </h5>
                <div class="content">{!!$post->content!!}</div>
                <a href="{{route('admin.post.edit', $post->id)}}" class="btn btn-primary">Edit</a>
                <form action="{{route('admin.post.delete', $post->id)}}" class="btn btn-danger" method="POST">
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
