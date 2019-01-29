<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //
    protected $fillable = [
        'name', 'street','number','number',
        'complement','neighborhood','city','country',
        'state' , 'cep', 'reference_point' , 'user_id'
    ];

    protected $guarded = ['id', 'created_at', 'update_at'];

}
