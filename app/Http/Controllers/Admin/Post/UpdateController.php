<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Http\Service\PostService;
use App\Models\Post;

class UpdateController extends Controller
{
    public PostService $service;

    public function __construct(PostService $service)
    {
        $this->service = $service;
    }

    public function __invoke(UpdateRequest $request, Post $post)
    {
        $post = $this->service->storeOrUpdate($request->all(), $post->id);

        return view('admin.post.show', compact('post'));
    }
}
