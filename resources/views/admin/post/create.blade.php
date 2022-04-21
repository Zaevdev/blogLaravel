@extends('adminlte::page')
@section('title', 'Posts')
@section('plugins.Select2', true)
@section('content_header')

    <x-head.tinymce-config/>
    <h1>Adding a post</h1>
@stop
@section('content')

    <div class="card card-primary">
        <form action="{{route('admin.post.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Title post</label>
                    <input type="text" class="form-control" name="title" placeholder="Enter title"
                           value="{{old('title')}}">
                </div>
                @error('title')
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-ban"></i>{{$message}}</h5>

                </div>
                @enderror
                <div class="form-group">
                    <label>Select category</label>
                    <select class="form-control" name="category_id">
                        <option selected disabled>Choose one</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" {{$category->id == old('category_id') ? 'selected' : ''}}>{{$category->title}}</option>
                        @endforeach
                    </select>
                </div>
                @error('category_id')
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-ban"></i> {{$message}}</h5>
                </div>
                @enderror
                <div class="form-group">
                    <textarea id="myeditorinstance" name="content">{{old('content')}}</textarea>
                </div>
                @error('content')
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-ban"></i>{{$message}}</h5>
                </div>
                @enderror
                @php
                    $config = [
                        "placeholder" => "Select multiple tags...",
                        "allowClear" => true,
                    ];
                @endphp
                <x-adminlte-select2 id="tags_id" name="tags_id[]" label="Tags" igroup-size="sm"
                                    :config="$config" multiple>
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-blue">
                            <i class="fas fa-tag"></i>
                        </div>
                    </x-slot>
                    @foreach($tags as $tag)
                        <option value="{{$tag->id}}" {{$tag->id == old('tags_id') ? 'selected' : ''}}>{{$tag->title}}</option>
                    @endforeach
                </x-adminlte-select2>
                <x-adminlte-input-file name="preview_image" igroup-size="sm" placeholder="Choose a image..."
                                       label="Preview image">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-blue">
                            <i class="fas fa-upload"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input-file>
                <x-adminlte-input-file name="main_image" igroup-size="sm" placeholder="Choose a image..."
                                       label="Main image">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-blue">
                            <i class="fas fa-upload"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input-file>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
@stop
@section('css')

@stop
@section('js')

@stop
