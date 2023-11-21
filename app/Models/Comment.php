<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'post_i',
        'user_id',
        'content'
    ];


    public function posts()
    {
        return $this->belongsTo(Post::class);
    }    

    public function users()
    {
        return $this->belongsTo(User::class);
    }  
}
