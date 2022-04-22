@extends('adminlte::page')
@section('title', 'Users')
@section('content_header')
    <h1>User</h1>
@stop
@section('content')
    <div class="card-body">
        <div class="card">
            <div class="card-body">
                <h5><span class="badge bg-secondary">#{{$user->id}}</span>&nbsp;{{$user->name}} </h5>
                <div class="content mb-2"><b>E-mail:&nbsp</b>{!!$user->email!!}</div>
                <a href="{{route('admin.user.edit', $user->id)}}" class="btn btn-primary">Edit</a>
                <form action="{{route('admin.user.delete', $user->id)}}" class="btn btn-danger" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="border-0 bg-transparent text-white">Delete</button>
                </form>
            </div>
        </div>
    </div>
@stop
@section('css')

@stop
@section('js')

@stop
