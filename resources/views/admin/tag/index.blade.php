@extends('adminlte::page')
@section('title', 'Tags')
@section('content_header')
    <h1>Tags</h1>
@stop
@section('content')
    <a class="btn btn-app" href="{{route('admin.tag.create')}}">
        <i class="fas fa-edit"></i> Add tag
    </a>

    <div class="card-body">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th>Title of tag</th>
                <th style="width: 40px">Label</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tags as $tag)
                <tr>
                    <td>{{$tag->id}}</td>
                    <td>{{$tag->title}}</td>
                    <td><a href="{{route('admin.tag.show', $tag->id)}}" class="btn btn-default btn-sm">
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
