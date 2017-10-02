<?php

namespace Cookiesoft\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = [
        'uf',
        'cep',
        'cidade',
        'rua',
        'numero',
        'complemento',
        'lat',
        'long'
    ];
}
