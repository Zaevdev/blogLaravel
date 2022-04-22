<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Http\Service\PostService;

class StoreController extends Controller
{
    public PostService $service;

    public function __construct(PostService $service)
    {
        $this->service = $service;
    }

    public function __invoke(StoreRequest $request)
    {
        $this->service->storeOrUpdate($request->validated());

        return redirect()->route('admin.post.index');
    }
}
