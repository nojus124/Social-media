<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use HasFactory;

    protected $fillable = [
        'postedByUserID',
        'communityID',
        'text',
        'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'postedByUserID');
    }

    public function community()
    {
        return $this->belongsTo(Community::class, 'communityID');
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function shares()
    {
        return $this->hasMany(Share::class);
    }
}
