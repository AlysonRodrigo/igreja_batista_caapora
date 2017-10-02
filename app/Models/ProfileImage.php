<?php

namespace Cookiesoft\Models;

use Illuminate\Database\Eloquent\Model;

class ProfileImage extends Model
{
    protected $fillable = [
        'user_id',
        'extension'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
