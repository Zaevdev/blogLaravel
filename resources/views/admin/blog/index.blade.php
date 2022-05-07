@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
    <h1>Dashboard</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">

            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $data['usersCount'] }}</h3>
                    <p>Users</p>
                </div>
                <div class="icon">
                    <i class="fas fa-solid fa-users"></i>
                </div>
                <a href="{{ route('admin.user.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $data['postsCount'] }}</h3>
                    <p>Posts</p>
                </div>
                <div class="icon">
                    <i class="far fa-fw fa-list-alt"></i>
                </div>
                <a href="{{ route('admin.post.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $data['categoriesCount'] }}</h3>
                    <p>Categories</p>
                </div>
                <div class="icon">
                    <i class="far fa-fw fa fa-paperclip"></i>
                </div>
                <a href="{{ route('admin.categories.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $data['tagsCount'] }}</h3>
                    <p>Tags</p>
                </div>
                <div class="icon">
                    <i class="far fa-fw fa fa-tag"></i>
                </div>
                <a href="{{ route('admin.tag.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

    </div>

@stop
@section('css')

@stop
@section('js')

@stop
