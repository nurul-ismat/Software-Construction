<?php

namespace App;

use App\User;
use App\GroupPermission;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //

    public function permission()
    {
        return $this->hasMany(GroupPermission::class, 'group_id', 'id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'user_group', 'id');
    }
}
