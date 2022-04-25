<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $table = 'roles'; // явная привязка к таблице
    protected $guarded = false; // чтобы изменять данные в таблице

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'roles_permissions');
    }
}
