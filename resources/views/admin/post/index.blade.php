@extends('adminlte::page')
@section('title', 'Posts')
@section('content_header')
    <h1>Tags</h1>
@stop
@section('content')
    <a class="btn btn-app" href="{{route('admin.post.create')}}">
        <i class="fas fa-edit"></i> Add post
    </a>

    <div class="card-body">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th>Title of post</th>
                <th style="width: 40px">Label</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td><a href="{{route('admin.post.show', $post->id)}}" class="btn btn-default btn-sm">
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
