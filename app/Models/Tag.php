<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tags'; // явная привязка к таблице
    protected $guarded = false; // чтобы изменять данные в таблице

    protected $fillable = [
        'title',
    ];
}
