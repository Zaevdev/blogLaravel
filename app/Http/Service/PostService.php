<?php

namespace App\Http\Service;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Psr\Log\LoggerInterface;
use Throwable;

class PostService
{
    protected FileService $fileService;
    protected LoggerInterface $logger;


    public function __construct(FileService $fileService, LoggerInterface $logger)
    {
        $this->fileService = $fileService;
        $this->logger = $logger;
    }

    public function storeOrUpdate(array $data, ?int $postId = null): Post
    {
        try {
            Db::beginTransaction();
            $data = $this->setImage($data);

            $post = Post::updateOrCreate([
                'id' => $postId,
            ], $data);

            $post->tags()->sync($data['tags_id'] ?? null);

            Db::commit();

            return $post;
        } catch (Throwable $exception) {
            try {
                Db::rollBack();
            } catch (Throwable $exception) {
                abort(500);
            }
            $this->logger->error($exception->getMessage());

            abort(500);
        }
    }

    protected function setImage(array $data): array
    {
        if (isset($data['preview_image'])) {
            $data['preview_image'] = $this->fileService->setStorage(
                FileService::DISK_PUBLIC,
                '/image',
                $data['preview_image']
            );
        }
        if (isset($data['main_image'])) {
            $data['main_image'] = $this->fileService->setStorage(
                FileService::DISK_PUBLIC,
                '/image',
                $data['main_image']
            );
        }

        return $data;
    }

}