<?php

declare(strict_types=1);

namespace App\Http\Service;

use Illuminate\Support\Facades\Storage;

class FileService
{
    public const DISK_PUBLIC = 'public';

    public function setStorage(string $disk, string $path, $file): bool|string
    {
        return Storage::disk($disk)->put($path, $file);
    }
}