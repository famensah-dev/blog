<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'file_name',
        'file_path'
    ];

    public function posts()
    {
        return $this->belongsTo(Post::class);
    }
}
