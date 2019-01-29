<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
        'birth_date', 'type', 'cpf'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $guarded = ['id', 'created_at', 'update_at'];
}
