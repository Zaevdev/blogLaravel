<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};

class ShowController extends Controller
{
    public function __invoke(Post $post): Factory|View|Application
    {
        return view('admin.post.show', compact('post'));
    }
}
