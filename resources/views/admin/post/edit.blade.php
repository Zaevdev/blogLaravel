@extends('adminlte::page')
@section('title', 'Posts')
@section('plugins.Select2', true)
@section('content_header')

    <x-head.tinymce-config/>
    <h1>Edit a post</h1>
@stop
@section('content')

    <div class="card card-primary">
        <form action="{{route('admin.post.update', $post->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="card-body">
                <div class="form-group">
                    <label>Title post</label>
                    <input type="text" class="form-control" name="title" placeholder="Enter title"
                           value="{{old('title', $post->title)}}">
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
                            <option value="{{$category->id}}" {{$category->id == $post->category_id ? 'selected' : ''}}>{{$category->title}}</option>
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
                    <textarea id="myeditorinstance" name="content">{{old('content', $post->content)}}</textarea>
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
                        <option value="{{$tag->id}}" {{in_array($tag->id, $post->tags ->pluck('id')->toArray()) ? 'selected' : ''}}>{{$tag->title}}</option>
                    @endforeach
                </x-adminlte-select2>
                @if(isset($post->preview_image))
                    <div class="attachment-block clearfix">
                        <img class="attachment-img" src="{{ asset(Storage::url($post->preview_image)) }}"
                             alt="Attachment Image">
                        @endif
                        <div class="attachment-pushed">
                            <x-adminlte-input-file name="preview_image" igroup-size="sm" placeholder="Choose a image..."
                                                   label="Preview image">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text bg-blue">
                                        <i class="fas fa-upload"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input-file>
                        </div>
                        @if(isset($post->preview_image))
                    </div>
                @endif
                @if(isset($post->main_image))
                    <div class="attachment-block clearfix">
                        <img class="attachment-img" src="{{ asset(Storage::url($post->main_image)) }}"
                             alt="Attachment Image">
                        @endif
                        <div class="attachment-pushed">
                            <x-adminlte-input-file name="main_image" igroup-size="sm" placeholder="Choose a image..."
                                                   label="Main image">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text bg-blue">
                                        <i class="fas fa-upload"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input-file>
                        </div>
                        @if(isset($post->main_image))
                    </div>
                @endif
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
