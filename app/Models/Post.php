<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title',
        'content',
        'user_id',
        'type',
        'group_id',
    ];


    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function groups()
    {
        return $this->belongsTo(Group::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function reactions()
    {
        return $this->hasMany(Reaction::class);
    }

    public function media()
    {
        return $this->hasOne(Media::class);
    }
}
