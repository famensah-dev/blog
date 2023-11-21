<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'setting_key',
        'seting_value',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }  
}
