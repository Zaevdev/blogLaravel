<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        try {
            $data = $request->validated();

            $tagsId = $data['tags_id'];
            unset($data['tags_id']);

            if (isset($data['preview_image'])) {
                $data['preview_image'] = Storage::disk('public')->put('/image', $data['preview_image']);
            }
            if (isset($data['main_image'])) {
                $data['main_image'] = Storage::disk('public')->put('/image', $data['main_image']);
            }

            $post = Post::firstOrCreate($data);
            $post->tags()->attach($tagsId);
        } catch (\Exception $e) {
            abort(404);
        }

        return redirect()->route('admin.post.index');
    }
}
