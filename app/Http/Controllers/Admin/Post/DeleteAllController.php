<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Throwable;

class DeleteAllController extends Controller
{
    /**
     * @throws Throwable
     *
     */
    public function __invoke()
    {
        $posts = Post::all();

        try {
            $posts->each(function ($post) {
                /**
                 * @var Post $post
                 */
                $post->tags()->detach();
                $post->forceDelete();
            });
        } catch (Throwable) {
            // придумать куда ошибку. Как вариант, в логгерИнтерфейс
            return redirect()->route('admin.post.index');
        }

        return redirect()->route('admin.post.index');
    }
}
