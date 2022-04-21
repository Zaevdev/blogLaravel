<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();
        if (isset($data['tags_id'])) {
            $tagsId = $data['tags_id'];
            unset($data['tags_id']);
        } else {
            $tagsId = null;
        }

        if (isset($data['preview_image'])) {
            $data['preview_image'] = Storage::disk('public')->put('/image', $data['preview_image']);
        }
        if (isset($data['main_image'])) {
            $data['main_image'] = Storage::disk('public')->put('/image', $data['main_image']);
        }


        $post->update($data);

        $post->tags()->sync($tagsId);

        return view('admin.post.show', compact('post'));
    }
}
