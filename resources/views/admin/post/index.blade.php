@extends('adminlte::page')
@section('title', 'Posts')
@section('content_header')
    <h1>Tags</h1>
@stop
@section('content')
    <div class="row">
        <a class="btn btn-app" href="{{route('admin.post.create')}}">
            <i class="fas fa-edit"></i> Add post
        </a>
        <form action="{{ route('admin.post.delete.all') }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-app"><i class="fas fa-edit"></i>Delete all</button>
        </form>
    </div>
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
                @php /** @var App\Models\Post $post */ @endphp
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

@stop
@section('js')

@stop
