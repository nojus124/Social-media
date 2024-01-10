<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class UserCommunity extends Model
{
    protected $fillable = [
        'user_id',
        'community_id',
        'role',
    ];
}
