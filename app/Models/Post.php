<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'posts'; // явная привязка к таблице
    protected $guarded = false; // чтобы изменять данные в таблице
    protected $fillable = [
        'title',
        'content',
        'category_id',
        'main_image',
        'preview_image',
        'tags_count',
        'updated_at',
    ];

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
    }
}
