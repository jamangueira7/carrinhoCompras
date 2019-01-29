<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shopping extends Model
{
    protected $fillable = [
        'user_id', 'address_id', 'code',
        'total'
    ];

    protected $guarded = ['id', 'created_at', 'update_at'];
}
