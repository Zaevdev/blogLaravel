@extends('adminlte::page')
@section('title', 'Categories')
@section('content_header')
    <h1>Adding a category</h1>
@stop
@section('content')

    <div class="card card-primary">
        <form action="{{route('admin.categories.store')}}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Title category</label>
                    <input type="text" class="form-control" name="title" placeholder="Enter title">
                </div>
                @error('title')
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-ban"></i> Error!</h5>
                    {{$message}}
                </div>
                @enderror
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
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
