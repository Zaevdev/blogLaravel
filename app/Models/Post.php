<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    //use SoftDeletes;

    protected $table = 'posts'; // явная привязка к таблице
    protected $guarded = false; // чтобы изменять данные в таблице
}
