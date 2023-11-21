<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'description',
        'is_locked',
    ];


    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
