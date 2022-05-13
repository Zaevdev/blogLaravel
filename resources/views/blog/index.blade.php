@extends('layouts.blog')
@section('content')
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">
            <!-- Featured blog post-->
            <div class="card mb-4">
                <a href="#!"><img class="card-img-top" src="https://dummyimage.com/850x350/dee2e6/6c757d.jpg"
                                  alt="..."/></a>
                <div class="card-body">
                    <div class="small text-muted">January 1, 2022</div>
                    <h2 class="card-title">Featured Post Title</h2>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid
                        atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero
                        voluptate voluptatibus possimus, veniam magni quis!</p>
                    <a class="btn btn-primary" href="#!">Read more →</a>
                </div>
            </div>
            <!-- Nested row for non-featured blog posts-->
            <div class="row">

                <div class="row">
                @foreach($posts as $post)
                    <!-- Blog post-->
                        <div class="col-md-6">
                            <div class="card mb-4">
                                @if(isset($post->preview_image))
                                    <img class="card-img-top"
                                         src="{{ asset(Storage::url($post->preview_image)) }}" alt="..."/>
                                @endif
                                <div class="card-body">
                                    <div class="small text-muted">{{ $post->updated_at->diffForHumans() }}<span class="badge bg-light text-dark m-1">{{ $post->category->title }}</span></div>

                                    <h2 class="card-title h4">{{ $post->title }}</h2>
                                    <p class="card-text">{!! $post->content !!}</p>
                                    <p>
                                        @foreach($post->tags as $tag)
                                        <span class="badge bg-secondary">{{ $tag->title }}</span>
                                        @endforeach
                                    </p>
                                    <a class="btn btn-primary" href="#!">Read more →</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Pagination-->
                {{ $posts->links() }}
            </div>
        </div>
        <!-- Side widgets-->
        <div class="col-lg-4">
            <!-- Search widget-->
            <div class="card mb-4">
                <div class="card-header">Search</div>
                <div class="card-body">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Enter search term..."
                               aria-label="Enter search term..." aria-describedby="button-search"/>
                        <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                    </div>
                </div>
            </div>
            <!-- Categories widget-->
            <div class="card mb-4">
                <div class="card-header">Categories</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            @foreach($categories as $category)
                                <span class="badge bg-secondary">{{$category->title}}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- Side widget-->
            <div class="card mb-4">
                <div class="card-header">Weather</div>
                <div class="card shadow-0 border">
                    <div class="card-body p-4">

                        <h4 class="mb-1 sfw-normal">Nizhniy Novgorod</h4>
                        <p class="mb-2">Current temperature: <strong>{{ $data['fact']['temp'] ?? '--'}}°C</strong></p>
                        <p>Feels like: <strong>{{ $data['fact']['feels_like'] ?? '--' }}°C</strong></p>
                        <div class="d-flex flex-row align-items-center">
                            <p class="mb-0 me-4">{{ ucfirst($data['fact']['condition']?? '--') }}</p>
                            <i class="fas fa-cloud fa-3x" style="color: #eee;"></i>
                        </div>

                    </div>
                </div>
            </div>
        </div>
@endsection
