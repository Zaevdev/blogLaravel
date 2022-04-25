@extends('adminlte::page')
@section('title', 'Users')
@section('content_header')
    <h1>Users</h1>
@stop
@section('content')
    <a class="btn btn-app" href="{{route('admin.user.create')}}">
        <i class="fas fa-edit"></i> Add user
    </a>

    <div class="card-body">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th>User name</th>
                <th>User email</th>
                <th style="width: 40px">Show</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td><a href="{{route('admin.user.show', $user->id)}}" class="btn btn-default btn-sm">
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
