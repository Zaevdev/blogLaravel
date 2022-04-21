<?php

namespace App\Http\Service;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store($data)
    {
        try {
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
        } catch (\Exception $exception) {
            abort(500);
        }
    }

    public function update($data, $post)
    {
        try {
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
        } catch (\Exception $exception) {
            abort(500);
        }

        return $post;
    }
}