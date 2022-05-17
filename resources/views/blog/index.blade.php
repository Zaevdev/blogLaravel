@extends('layouts.blog')
@section('content')
    @php
        /**  @var \App\Models\Post $post */
    @endphp
        <!-- Blog entries-->
        <div class="col-lg-8">
            <!-- Featured blog post-->
            <div class="card mb-4">
                <a href=""><img class="card-img-top" src="https://dummyimage.com/850x350/dee2e6/6c757d.jpg"
                                  alt="..."/></a>
                <div class="card-body">
                    <div class="small text-muted">January 1, 2022</div>
                    <h2 class="card-title">Featured Post Title</h2>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid
                        atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero
                        voluptate voluptatibus possimus, veniam magni quis!</p>
                    <a class="btn btn-primary" href="">Read more →</a>
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
                                    <div class="small text-muted">{{ $post->updated_at->diffForHumans() }}<span
                                                class="badge bg-light text-dark m-1">{{ $post->category->title }}</span>
                                    </div>

                                    <h2 class="card-title h4">{{ $post->title }}</h2>
                                    <p class="card-text">{!! $post->content !!}</p>
                                    <p>
                                        @foreach($post->tags as $tag)
                                            <span class="badge bg-secondary">{{ $tag->title }}</span>
                                        @endforeach
                                    </p>
                                    <a class="btn btn-primary" href="{{route('blog.post.show', $post->id)}}">Read more →</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Pagination-->
                {{ $posts->links() }}
            </div>
        </div>
    @endsection


