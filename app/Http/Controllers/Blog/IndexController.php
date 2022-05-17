<?php

declare(strict_types=1);

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};

class IndexController extends Controller
{
    public function __invoke(): Factory|View|Application
    {
        $posts = Post::paginate(10);


//        if ($posts->isEmpty()) {
//            abort(404);
//        }
        return view('blog.index', compact('posts'));
    }
}
