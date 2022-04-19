@extends('adminlte::page')
@section('title', 'Tags')
@section('content_header')
    <h1>Edit a tag</h1>
@stop
@section('content')

    <div class="card card-primary">
        <form action="{{route('admin.tag.update', $tag->id)}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="card-body">
                <div class="form-group">
                    <label>Title tag</label>
                    <input type="text" class="form-control" name="title" placeholder="Enter title" value="{{$tag->title}}">
                </div>
                @error('title')
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-ban"></i> Error!</h5>
                    {{$message}}
                </div>
                @enderror
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
        </form>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
    <script> console.log('Hi!'); </script>
@stop
